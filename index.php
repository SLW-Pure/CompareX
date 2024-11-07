<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slaweally Metin karşılaştır || Text Compare</title>
    <meta name="description" content="Metin karşılaştırma ve farkları bulma aracı.">
    <link rel="canonical" href="https://alicomez.com/">
    <meta property="og:locale" content="tr_TR">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Metin karşılaştırma ve farkları bulma aracı.">
    <meta property="og:description" content="Metin karşılaştırma ve farkları bulma aracı.">
    <meta property="og:url" content="https://alicomez.com/">
    <meta property="og:site_name" content="Ali Çömez">
    <meta property="article:published_time" content="2024-09-20T08:45:55+00:00">
    <meta property="article:modified_time" content="2024-09-20T09:17:58+00:00">
    <meta property="og:image" content="https://alicomez.com/">
    <meta property="og:image:width" content="728">
    <meta property="og:image:height" content="380">
    <meta property="og:image:type" content="image/webp">
    <meta name="author" content="Slaweally">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:label1" content="Yazan:">
    <meta name="twitter:data1" content="Slaweally">
    <meta name="twitter:label2" content="Tahmini okuma süresi">
    <meta name="twitter:data2" content="14 dakika">

    <link rel="stylesheet" href="style.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Tarayıcı dilini kontrol et
            const userLang = navigator.language || navigator.userLanguage;

            // Eğer tarayıcı dili Türkçe değilse, içerik İngilizce'ye çevrilecek
            if (userLang !== "tr" && !userLang.startsWith("tr")) {
                translateToEnglish();
            }
        });

        function translateToEnglish() {
            // HTML 'lang' özniteliğini güncelle
            document.documentElement.lang = "en";

            // Meta verileri güncelle
            document.querySelector('meta[name="description"]').setAttribute('content', 'Text comparison and difference finding tool.');
            document.querySelector('meta[property="og:title"]').setAttribute('content', 'Text Comparison and Difference Finder Tool.');
            document.querySelector('meta[property="og:description"]').setAttribute('content', 'Text comparison and difference finding tool.');

            // Başlık ve butonları güncelle
            const titleElement = document.querySelector(".title");
            if (titleElement) {
                titleElement.innerHTML = "Slaweally Compare -> <button id='infoButton' class='info-button'>Info</button>";
            }

            const toggleModeButton = document.getElementById("toggleMode");
            if (toggleModeButton) {
                toggleModeButton.innerText = "Dark Mode";
            }

            // Modal içeriğini güncelle
            const modalTitle = document.querySelector(".modal-content h2");
            if (modalTitle) {
                modalTitle.innerText = "About Slaweally Compare";
            }

            const modalParagraph = document.querySelector(".modal-content p");
            if (modalParagraph) {
                modalParagraph.innerText = "This system is designed to compare two different texts line by line and highlight the differences visually. Slaweally Compare is ideal for quickly finding small differences, especially in long and complex documents.";
            }

            const features = document.querySelectorAll(".modal-content ul li");
            if (features.length > 0) {
                features[0].innerHTML = "<strong>Compare and highlight differences between two texts:</strong> You can visually notice which lines are different and which words have changed by comparing your texts line by line. The background of different lines is highlighted, and different words are shown in red.";
                features[1].innerHTML = "<strong>'Skip to Show' Button:</strong> This feature allows you to quickly jump to the different lines. The system scans all texts and allows you to easily access the lines where it finds differences.";
                features[2].innerHTML = "<strong>'Show Only Differences' Button:</strong> This function only displays the lines that are different between the two texts. You can reload the full text by clicking again.";
                features[3].innerHTML = "<strong>Dark/Light Mode Support:</strong> You can switch the system view to Dark Mode or Light Mode. It provides a more comfortable user experience.";
                features[4].innerHTML = "<strong>Text cleaning and editing functions:</strong> You can also clean your texts, convert them to lowercase, and remove unnecessary spaces in the system.";
            }

            // Diğer başlıklar ve açıklamaları güncelle
            const headings = document.querySelectorAll(".modal-content h3");
            if (headings.length > 0) {
                headings[0].innerText = "Main Features";
                headings[1].innerText = "Use Cases";
                headings[2].innerText = "How to Use?";
                headings[3].innerText = "Technical Details and Security";
                headings[4].innerText = "Conclusion";
            }

            const useCases = document.querySelectorAll(".modal-content ul")[1]?.children;
            if (useCases) {
                useCases[0].innerHTML = "<strong>Comparing Large Documents:</strong> Used to find differences between two versions, especially when working with large and complex documents.";
                useCases[1].innerHTML = "<strong>Code Comparison:</strong> Can detect changes between two different versions of code, saving you time during development processes.";
                useCases[2].innerHTML = "<strong>Reports and Documents:</strong> You can quickly make changes by seeing which lines have changed in texts with multiple versions.";
            }

            const howToUse = document.querySelectorAll(".modal-content ol")[0]?.children;
            if (howToUse) {
                howToUse[0].innerText = "Enter or paste the two texts you want to compare into the input fields.";
                howToUse[1].innerText = "Click the 'Compare' button. The system will compare the texts line by line and show you which lines are different.";
                howToUse[2].innerText = "Use the 'Skip to Show' button to quickly jump to different lines.";
                howToUse[3].innerText = "If you only want to see the different lines, click the 'Show Only Differences' button. This button will only show the different lines between the two texts. Clicking again will reload the full text.";
                howToUse[4].innerText = "For a light-sensitive usage, change the view mode using the 'Dark Mode' button at the top right corner.";
                howToUse[5].innerText = "Use the function buttons to clear texts, convert to lowercase, or remove unnecessary spaces.";
            }

            // Buton ve diğer öğeleri güncelle
            const compareButton = document.getElementById("compareBtn");
            if (compareButton) {
                compareButton.innerText = "Compare";
            }

            const skipButton = document.getElementById("skipButton");
            if (skipButton) {
                skipButton.innerText = "Skip Line / Show Differences";
            }

            const showDifferencesButton = document.getElementById("showDifferencesButton");
            if (showDifferencesButton) {
                showDifferencesButton.innerText = "Show Only Differences";
            }

            const warningMessage = document.getElementById("warningMessage");
            if (warningMessage) {
                warningMessage.innerText = "Maximum line limit of 5000 exceeded. Excess lines were not processed.";
            }
        }
    </script>
</head>
<body>
    <div class="header">
        <h1 class="title">Slaweally Compare -> <button id="infoButton" class="info-button">Info</button></h1>
        <button id="toggleMode" class="mode-toggle">Dark Mode</button>
    </div>

    <!-- Modal -->
    <div id="infoModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Slaweally Compare Hakkında</h2>
            <p>
                Bu sistem, iki farklı metni satır satır karşılaştırarak farklılıkları görsel olarak vurgulamak amacıyla geliştirilmiştir. Slaweally Compare, özellikle uzun ve karmaşık dokümanlarda küçük farklılıkları hızlıca bulmak için ideal bir çözümdür.
            </p>
            <h3>Ana Özellikler</h3>
            <ul>
                <li><strong>İki metni karşılaştırma ve farkları vurgulama:</strong> Metinlerinizi satır satır karşılaştırarak hangi satırların farklı olduğunu ve hangi kelimelerde değişiklikler olduğunu görsel olarak fark edebilirsiniz. Farklı olan satırların arka planı vurgulanır ve farklı kelimeler kırmızı renkle gösterilir.</li>
                <li><strong>"Atla Göster" Butonu:</strong> Bu özellik, farklı olan satırlara hızlıca atlamanızı sağlar. Sistem, tüm metinleri tarar ve farklılık bulduğu satırlara kolayca ulaşmanızı sağlar.</li>
                <li><strong>"Sadece Farkları Göster" Butonu:</strong> Bu işlev, yalnızca iki metin arasında farklı olan satırları görüntüler. Tekrar tıklayarak tüm metni geri yükleyebilirsiniz.</li>
                <li><strong>Dark/Light Mode Desteği:</strong> Sistemin görünümünü Dark Mode veya Light Mode'a çevirebilirsiniz. Kullanıcıya daha rahat bir kullanım deneyimi sunar.</li>
                <li><strong>Metin temizleme ve düzenleme işlevleri:</strong> Sistemde ayrıca metinlerinizi temizleyebilir, küçük harfe çevirebilir ve gereksiz boşlukları kaldırabilirsiniz.</li>
            </ul>

            <h3>Kullanım Alanları</h3>
            <p>
                Slaweally Compare, özellikle aşağıdaki senaryolar için idealdir:
            </p>
            <ul>
                <li><strong>Büyük Dokümanları Karşılaştırma:</strong> Özellikle büyük ve kompleks dokümanlar üzerinde çalışırken, iki sürüm arasındaki farkları bulmak için kullanılır.</li>
                <li><strong>Kod Karşılaştırması:</strong> İki farklı kod sürümü arasındaki değişiklikleri tespit edebilir, bu sayede geliştirme süreçlerinde zaman kazanabilirsiniz.</li>
                <li><strong>Rapor ve Belgeler:</strong> Birden fazla versiyona sahip metinlerde, hangi satırlarda değişiklikler olduğunu görüp düzenlemeleri hızlıca yapabilirsiniz.</li>
            </ul>

            <h3>Nasıl Kullanılır?</h3>
            <p>
                Sistemi kullanmak oldukça basittir. İşte adım adım kullanım rehberi:
            </p>
            <ol>
                <li>Karşılaştırmak istediğiniz iki metni giriş alanlarına yazın veya yapıştırın.</li>
                <li>"Karşılaştır" butonuna tıklayın. Sistem, metinleri satır satır karşılaştırarak hangi satırların farklı olduğunu size gösterecek.</li>
                <li>"Atla Göster" butonunu kullanarak, farklı satırlara hızlıca atlayabilirsiniz.</li>
                <li>Eğer sadece farklı olan satırları görmek istiyorsanız, "Sadece Farkları Göster" butonuna tıklayabilirsiniz. Bu buton, sadece iki metin arasındaki farklı satırları gösterecek, tekrar tıkladığınızda tüm metin geri yüklenecektir.</li>
                <li>Işığa duyarlı bir kullanım için, sağ üst köşedeki "Dark Mode" butonunu kullanarak görünüm modunu değiştirebilirsiniz.</li>
                <li>Metinleri temizlemek, küçük harfe çevirmek veya gereksiz boşlukları kaldırmak için ilgili fonksiyon butonlarını kullanabilirsiniz.</li>
            </ol>

            <h3>Teknik Detaylar ve Güvenlik</h3>
            <p>
                Sistem, kullanıcı dostu bir arayüzle iki metni satır satır karşılaştırmak üzerine kurulmuştur. Güvenlik açısından, kullanıcı girdileri XSS (Cross-Site Scripting) saldırılarına karşı korunmaktadır. Metinler ekrana yazdırılmadan önce özel olarak kaçış karakterleri ile temizlenir, böylece kötü niyetli kod çalıştırma girişimlerine karşı güvenlik sağlanır.
            </p>
            <p>
                Metin girişlerinde belirli sınırlamalar bulunur, kullanıcı başına maksimum 5000 satır ve yaklaşık 100.000 karakter ile sınırlıdır. Bu limitler, performans sorunlarını ve kötüye kullanımı önlemeye yardımcı olur.
            </p>
            <p>
                Sunucuya yönelik herhangi bir yük oluşturulmamakta, tüm işlemler tarayıcı üzerinde gerçekleştirilmekte ve böylece verileriniz sunuculara gönderilmeden tamamen gizli kalmaktadır.
            </p>

            <h3>Sonuç</h3>
            <p>
                Slaweally Compare, uzun metinler ve dokümanlar arasında hızlı, verimli ve güvenli bir şekilde karşılaştırma yapmak için tasarlanmıştır. Özellikle büyük dokümanlarla çalışanlar için farklılıkları bulmak ve düzenlemeleri hızlandırmak amacıyla önemli bir aracınızdır. Sistemin sunduğu kullanıcı dostu özellikler sayesinde metinler arasında hataları bulmak artık çok daha kolay ve hızlı.
            </p>

        </div>
    </div>

<div class="text-inputs">
        <div class="input-container">
            <textarea id="input1" placeholder="İlk metni giriniz"></textarea>
            <div class="function-buttons">
                <button onclick="clearText('input1')">Temizle</button>
                <button onclick="convertToLower('input1')">Küçük Harfe Çevir</button>
                <button onclick="removeSpaces('input1')">Boşlukları Temizle</button>
            </div>
        </div>
        <div class="input-container">
            <textarea id="input2" placeholder="Karşılaştırılacak metni giriniz"></textarea>
            <div class="function-buttons">
                <button onclick="clearText('input2')">Temizle</button>
                <button onclick="convertToLower('input2')">Küçük Harfe Çevir</button>
                <button onclick="removeSpaces('input2')">Boşlukları Temizle</button>
            </div>
        </div>
    </div>

    <button id="compareBtn" class="compare-button">Karşılaştır</button>

    <!-- Yeni Atla Göster Butonu -->
    <div id="result-controls" style="display: none;" align="center">
        <button id="skipButton" class="function-button">Satır Atla / Farkları Göster</button>
        <button id="showDifferencesButton" class="function-button">Sadece Farkları Göster</button>
    </div>

    <div class="result-area" id="resultArea" style="display: none;">
        <pre id="result1" class="result-output"></pre>
        <pre id="result2" class="result-output"></pre>
    </div>

    <div id="warningMessage" style="display: none; color: red;">Maksimum 5000 satır sınırı aşıldı. Fazla satırlar işlenmedi.</div>

    <script src="app.js"></script>
</body>
</html>
