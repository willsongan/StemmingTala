<html>
<?php require_once 'main.php'; ?>
    <head>
        <title>Stemmer Tala</title>
        <style>
            .container{
                width: auto;
                margin: 50px auto;
                box-sizing: border-box;
                padding: 10px;
            }

            header{
                background-color: #B063D8;
                padding:40px 0;
                text-align: center;
                font-size: 35px;
                font-weight: bold;
                font-family: Arial;
                text-transform: uppercase;
            }

            h1{
                text-align: center;
                background-color: bisque;
                margin: auto;
            }
            
            .batas{
                padding:5px;
            }

            .content{
                display: flex;
            }

            .sidebar {
                flex: 1;
            }

            .casefold {
                flex: 1;
            }

            .paragraf {
                flex: 1;
            }

            .stopword {
                flex: 1;
            }

            .awalan1 {
                flex: 1;
            }

            .sidebar aside{
                background-color:aqua;
                padding: 199px 0;
                text-align: center;
            }

            .casefold aside{
                background-color:aqua;
                padding: 199px 0;
                text-align: center;
            }
            
            .paragraf aside{
                background-color:aqua;
                padding: 350px 0;
                text-align: center;
            }

            .stopword aside{
                background-color:aqua;
                padding: 150px 0;
                text-align: center;
            }

            .awalan1 aside{
                background-color:aqua;
                padding: 210px 0;
                text-align: center;
            }

            main{
                background-color: wheat;
                box-sizing: border-box;
                padding: 20px;
                flex:2;
                text-align: justify;
            }

            .padtop{
                padding-top: 90px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header>Stemmer Tala</header>
            <div class="content">
                <div class="sidebar">
                    <aside>Original Text</aside>
                </div>
                <main><?php echo $doc;?></main>
            </div>

            <header>Data Preparation</header>
            <div class="content">
                <div class="casefold">
                    <aside>Case Folding</aside>
                </div>
                <main><?php echo $docfold;?><hr></main>
            </div>

            <div class="batas"></div>

            <div class="content">
                <div class="sidebar">
                    <div class="paragraf">
                        <aside>Bagi per paragraf</aside>
                    </div>
                </div>
                <main><?php foreach($paragraphs as $prf){
                echo $prf . '<br>','<br>';}?>
                <hr>
                </main>
            </div>

            <div class="batas"></div>
            
            <div class="content">
                <div class="sidebar">
                    <div class="paragraf">
                        <aside>Filtering</aside>
                    </div>
                </div>
                <main><?php foreach($filteredParagraphs as $fprf){
                echo $fprf . '<br>','<br>';}?>
                <hr>
                </main>
            </div>

            <div class="batas"></div>

            <div class="content">
                <div class="sidebar">
                    <div class="stopword">
                        <aside>Stopword</aside>
                    </div>
                </div>
                <main><?php foreach($b as $b){
                echo $b . ' ';}?>
                <br>
                <hr>
                </main>
            </div>

            <header>Algoritma Tala</header>
            <div class="content">
                <div class="sidebar">
                    <div class="stopword">
                        <aside>Menghilangkan Sandang & Kepunyaan <br>
                        (lah, kah, pun, ku, mu, nya)
                        </aside>
                    </div>
                </div>
                <main><?php foreach($filteredTokens as $ftoken){
                echo $ftoken . ' ';}?>
                <br>
                <hr>
                </main>
            </div>

            <div class="batas"></div>

            <div class="content">
                <div class="sidebar">
                    <div class="awalan1">
                        <aside>Menghilangkan Awalan 1 <br>
                        (meny, peny, mem, pem, meng, men, mem, me, peng, pen, pem, di, ter, ke)
                        </aside>
                    </div>
                </div>
                <main>
                    <h2>Terkena Aturan</h2>
                    <?php foreach($FPRtoken as $fpr){
                echo $fpr . ' ';}?>
                <br>
                <hr>
                    <h2>Lolos Dari Aturan</h2>
                    <?php foreach($nonFPRtoken as $nfpr){
                    echo $nfpr . ' ';}?>
                <br>
                <hr>
                </main>
            </div>

            <div class="batas"></div>

            <div class="content">
                <div class="sidebar">
                    <div class="stopword">
                        <aside> (Menghilangkan Awalan 1 = True)<br>
                            Menghilangkan Akhiran<br>
                        (kan, an, i)
                        </aside>
                    </div>
                </div>
                <main>
                    <h2>Terkena Aturan</h2>
                    <?php foreach($SRtoken as $srt){
                echo $srt . ' ';}?>
                <br>
                <hr>
                    <h2>Lolos Dari Aturan</h2>
                    <?php foreach($nonSRtoken as $nsrt){
                    echo $nsrt . ' ';}?>
                <br>
                <hr>
                </main>
            </div>

            <div class="batas"></div>
            
            <div class="content">
                <div class="sidebar">
                    <div class="stopword">
                        <aside> (Menghilangkan Akhiran = True)<br>
                            Menghilangkan Awalan 2<br>
                        (bel, pel, ber, per, pe, be)
                        </aside>
                    </div>
                </div>
                <main>
                    <h2>Terkena Aturan</h2>
                    <?php foreach($SPRtoken1 as $sprt1){
                echo $sprt1 . ' ';}?>
                <br>
                <hr>
                    <h2>Lolos Dari Aturan</h2>
                    <?php foreach($nonSPRtoken1 as $nsprt1){
                    echo $nsprt1 . ' ';}?>
                <br>
                <hr>
                </main>
            </div>
            
            <div class="batas"></div>

            <div class="content">
                <div class="sidebar">
                    <div class="awalan1">
                        <aside> (Menghilangkan Awalan 1 = False)<br>
                            Menghilangkan Awalan 2<br>
                        (bel, pel, ber, per, pe, be)
                        </aside>
                    </div>
                </div>
                <main>
                    <h2>Terkena Aturan</h2>
                    <?php foreach($SPRtoken as $sprt){
                echo $sprt . ' ';}?>
                <br>
                <hr>
                    <h2>Lolos Dari Aturan</h2>
                    <?php foreach($nonSPRtoken as $nsprt){
                    echo $nsprt . ' ';}?>
                <br>
                <hr>
                </main>
            </div>

            <div class="batas"></div>

            <div class="content">
                <div class="sidebar">
                    <div class="stopword">
                        <aside> (Lanjutan Menghilangkan Awalan 2)<br>
                            Menghilangkan Akhiran<br>
                            (kan, an, i)
                        </aside>
                    </div>
                </div>
                <main>
                    <h2>Terkena Aturan</h2>
                    <?php foreach($SRtoken1 as $srt1){
                echo $srt1 . ' ';}?>
                <br>
                <hr>
                    <h2>Lolos Dari Aturan</h2>
                    <?php foreach($nonSRtoken1 as $nsrt1){
                    echo $nsrt1 . ' ';}?>
                <br>
                <hr>
                </main>
            </div>

            <header>Hasil Akhir</header>
            <div class="content">
                <div class="sidebar">
                        <aside> Sebelum</aside>
                </div>
                <main><?php echo $doc;?></main>
            </div>

            <div class="batas"></div>

            <div class="content">
                <div class="sidebar">
                    <div class="stopword">
                        <aside> Sesudah</aside>
                    </div>
                </div>
                <main>
                    <div class="padtop"></div>
                    <?php foreach($SPRtoken as $sprt){
                    echo $sprt . ' ';}?>
                    <?php foreach($nonSPRtoken as $nsprt){
                    echo $nsprt . ' ';}?>
                    <?php foreach($SRtoken1 as $srt1){
                    echo $srt1 . ' ';}?>
                    <?php foreach($nonSRtoken1 as $nsrt1){
                    echo $nsrt1 . ' ';}?>
                <br>
                <hr>
                </main>
            </div>
        </div>
    </body>
</html>