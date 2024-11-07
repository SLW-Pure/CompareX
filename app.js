// Karşılaştırma Butonu
document.getElementById('compareBtn').addEventListener('click', function() {
    const text1 = document.getElementById('input1').value;
    const text2 = document.getElementById('input2').value;

    // Metin uzunluğunu kontrol et
    if (text1.length > 100000 || text2.length > 100000) {
        alert("Girdi çok uzun! Lütfen daha kısa bir metin girin.");
        return;  // Bu artık bir fonksiyon içinde, sorun yaratmayacak
    }

    const lines1 = text1.split('\n').slice(0, 5000);
    const lines2 = text2.split('\n').slice(0, 5000);
    let differentLines = [];

    if (text1.split('\n').length > 5000 || text2.split('\n').length > 5000) {
        document.getElementById('warningMessage').style.display = 'block';
    } else {
        document.getElementById('warningMessage').style.display = 'none';
    }

    document.getElementById('resultArea').style.display = 'flex';

    let result1 = '';
    let result2 = '';
    for (let i = 0; i < lines1.length; i++) {
        const line1 = lines1[i] || '';
        const line2 = lines2[i] || '';

        const lineClass = line1 !== line2 ? 'different-line' : '';

        if (line1 !== line2) {
            differentLines.push(i);
        }

        result1 += `<span class="line-number">${i + 1}</span><span class="${lineClass}">${highlightDifference(line1, line2)}</span>\n`;
        result2 += `<span class="line-number">${i + 1}</span><span class="${lineClass}">${highlightDifference(line2, line1)}</span>\n`;
    }

    document.getElementById('result1').innerHTML = result1;
    document.getElementById('result2').innerHTML = result2;

    // Atla Göster Butonunu Görüntüle
    if (differentLines.length > 0) {
        document.getElementById('result-controls').style.display = 'block';
        setupSkipButton(differentLines);
    } else {
        document.getElementById('result-controls').style.display = 'none';
    }
});

// Dark/Light Mode Geçişi
document.getElementById('toggleMode').addEventListener('click', function() {
    document.body.classList.toggle('light-mode');
    const mode = document.body.classList.contains('light-mode') ? 'Light Mode' : 'Dark Mode';
    document.getElementById('toggleMode').textContent = mode;
});

// Temizleme, Küçük Harfe Çevirme ve Boşluk Temizleme Fonksiyonları
function clearText(id) {
    document.getElementById(id).value = '';
}

function convertToLower(id) {
    let text = document.getElementById(id).value;
    document.getElementById(id).value = text.toLowerCase();
}

function removeSpaces(id) {
    let text = document.getElementById(id).value;
    document.getElementById(id).value = text.replace(/\s+/g, ' ').trim();
}

// Farklılıkları Kırmızı Renkte Gösterme
function highlightDifference(text1, text2) {
    const words1 = text1.split(' ');
    const words2 = text2.split(' ');

    return words1.map((word, index) => {
        const escapedWord = escapeHTML(word);
        return word !== words2[index] ? `<span style="color: red;">${escapedWord}</span>` : escapedWord;
    }).join(' ');
}

// Modal ile ilgili işlemler
var modal = document.getElementById("infoModal");
var btn = document.getElementById("infoButton");
var span = document.getElementsByClassName("close")[0];

// Butona tıklandığında modal açılır
btn.onclick = function() {
    modal.style.display = "flex";
}

// X işaretine tıklandığında modal kapanır
span.onclick = function() {
    modal.style.display = "none";
}

// Modal dışında bir yere tıklandığında modal kapanır
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

let originalResult1 = ''; // Orijinal metni saklamak için
let originalResult2 = '';
let showingDifferences = false; // Toggle durumu için

// "Atla Göster" Fonksiyonu
function setupSkipButton(differentLines) {
    let currentIndex = 0;

    document.getElementById('skipButton').addEventListener('click', function() {
        const nextLineIndex = differentLines[currentIndex];
        
        // Her iki sonuç alanını aynı satıra ortalayacak şekilde kaydırıyoruz
        scrollToLine(document.getElementById('result1'), nextLineIndex);
        scrollToLine(document.getElementById('result2'), nextLineIndex);
        
        currentIndex = (currentIndex + 1) % differentLines.length;
    });

    // "Sadece Farkları Göster" butonuna işlev ekliyoruz
    document.getElementById('showDifferencesButton').addEventListener('click', function() {
        if (!showingDifferences) {
            showOnlyDifferences();
        } else {
            restoreOriginalText();
        }
        showingDifferences = !showingDifferences;
    });
}

// Farklılıkları gösterme fonksiyonu
function showOnlyDifferences() {
    const result1 = document.getElementById('result1');
    const result2 = document.getElementById('result2');
    
    // Orijinal metinleri sakla (ilk tıklamada saklanacak)
    if (!originalResult1) originalResult1 = result1.innerHTML;
    if (!originalResult2) originalResult2 = result2.innerHTML;
    
    // Tüm satırları alın
    const lines1 = originalResult1.split('\n');
    const lines2 = originalResult2.split('\n');
    
    let filteredResult1 = '';
    let filteredResult2 = '';

    for (let i = 0; i < lines1.length; i++) {
        if (lines1[i] !== lines2[i]) {
            filteredResult1 += lines1[i] + '\n';
            filteredResult2 += lines2[i] + '\n';
        }
    }

    result1.innerHTML = filteredResult1;
    result2.innerHTML = filteredResult2;
}

// Orijinal metni geri yükleme fonksiyonu
function restoreOriginalText() {
    document.getElementById('result1').innerHTML = originalResult1;
    document.getElementById('result2').innerHTML = originalResult2;
}

// Satırı ekranın ortasına kaydırma fonksiyonu
function scrollToLine(element, lineIndex) {
    const lineHeight = 20; // Satır yüksekliği (px)
    const scrollPosition = lineIndex * lineHeight;
    const visibleHeight = element.clientHeight;

    // Satırın tam ortada olacak şekilde kaydırma işlemi
    element.scrollTo({
        top: scrollPosition - visibleHeight / 2 + lineHeight / 2,
        behavior: 'smooth'
    });
}

// Metinleri güvenli bir şekilde kaçış yaparak gösteren fonksiyon
function escapeHTML(text) {
    return text.replace(/&/g, '&amp;')
               .replace(/</g, '&lt;')
               .replace(/>/g, '&gt;')
               .replace(/"/g, '&quot;')
               .replace(/'/g, '&#039;');
}


/*-------------------------------------------------*/
