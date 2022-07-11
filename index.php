<?php require_once 'main.php'; ?>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1 class="level-1 rectangle"> Dokumen Asli
        <p><?php echo $doc;?></p>
    </h1>
      <ol class="level-2-wrapper">
        <li>
          <h2 class="level-2 rectangle">Case Fold</h2>
          <ol class="dataprep-wrapper">
            <li>
              <h3 class="dataprep rectangle"><?php echo $docfold;?></h3>
            </li>
          </ol>
        </li>
        <li>
          <h2 class="level-2 rectangle">Filtering</h2>
          <ol class="dataprep-wrapper">
            <li>
              <h3 class="dataprep rectangle"><?php foreach($filteredParagraphs as $fprf){
                echo $fprf . '<br>','<br>';}?></h3>
            </li>
          </ol>
        </li>
        <li>
          <h2 class="level-2 rectangle">Stopword Removal</h2>
          <ol class="dataprep-wrapper">
            <li>
              <h3 class="dataprep rectangle"><?php foreach($b as $b){
                echo $b . ' ';}?></h3>
            </li>
          </ol>
        </li>
        <li>
          <h2 class="level-2 rectangle">Menghilangkan Sandang & Kepunyaan <br><p>(lah, kah, pun, ku, mu, nya)</p></h2>
          <ol class="dataprep-wrapper">
            <li>
              <h3 class="dataprep rectangle"><?php foreach($filteredTokens as $ftoken){
                echo $ftoken . ' ';}?></h3>
            </li>
          </ol>
        </li>
        <li>
          <h2 class="level-2 rectangle">Menghilangkan Awalan 1 <br><p>(meny, peny, mem, pem, meng, men, mem, me, peng, pen, pem, di, ter, ke)</p></h2>
          <ol class="level-3-wrapper">
            <li>
              <h3 class="level-4 rectangle">Terkena Aturan  
              <p><?php foreach($FPRtoken as $fpr){
                echo $fpr . ' ';}?></p>
              </h3>
            </li>
            <li>
              <h3 class="level-4 rectangle">Tidak Terkena Aturan 
                <p><?php foreach($nonFPRtoken as $nfpr){
                    echo $nfpr . ' ';}?></p>
              </h3>
          </ol>
          <ol class="level-3-wrapper">
            <li>
              <h3 class="level-3 rectangle">Menghilangkan Akhiran
                <p>(kan, an, i)</p>
              </h3>
              <ol class="level-4-wrapper">
                <li>
                  <h4 class="level-4 rectangle">Terkena Aturan 
                    <p><?php foreach($SRtoken as $nsrt){
                    echo $nsrt . ' ';}?></p>
                  </h4>
                </li>
                <li>
                  <h4 class="level-5 rectangle">Tidak Terkena Aturan<br>(Stemming Selesai)
                    <p><?php foreach($nonSRtoken as $nsrt){
                    echo $nsrt . ' ';}?></p>
                  </h4>
                </li>
              </ol>
            </li>
            <li>
              <h3 class="level-3 rectangle">Menghilangkan Awalan 2
                <p>(bel, pel, ber, per, pe, be)</p>
              </h3>
              <ol class="level-4-wrapper">
              <li>
                  <h4 class="level-4 rectangle">Terkena Aturan 
                    <p><?php foreach($SPRtoken as $nsprt){
                    echo $nsprt . ' ';}?></p>
                  </h4>
                </li>
                <li>
                  <h4 class="level-4 rectangle">Tidak Terkena Aturan
                    <p><?php foreach($nonSPRtoken as $nsprt){
                    echo $nsprt . ' ';}?></p>
                  </h4>
                </li>
                </li>
              </ol>
            </li>
          </ol>
        <ol class="level-3-wrapper">
            <li>
            <h3 class="level-3 rectangle">Menghilangkan Awalan 2
                <p>(bel, pel, ber, per, pe, be)</p>
              </h3>
              
              <ol class="level-4-wrapper">
                <li>
                <h4 class="level-5 rectangle">Terkena Aturan <br>(Stemming Selesai)
                    <p><?php foreach($SPRtoken1 as $nsprt1){
                    echo $nsprt1 . ' ';}?></p>
                  </h4>
                </li>
                <li>
                  <h4 class="level-5 rectangle">Tidak Terkena Aturan<br>(Stemming Selesai)
                    <p><?php foreach($nonSPRtoken1 as $nsprt1){
                    echo $nsprt1 . ' ';}?></p>
                  </h4>
                </li>
              </ol>
            </li>
            <li>
            <h3 class="level-3 rectangle">Menghilangkan Akhiran
                <p>(kan, an, i)</p>
              </h3>
              <ol class="level-4-wrapper">
              <li>
                  <h4 class="level-5 rectangle">Terkena Aturan <br>(Stemming Selesai)
                    <p> <?php foreach($SRtoken1 as $srt1){
                    echo $srt1 . ' ';}?></p>
                  </h4>
                </li>
                <li>
                  <h4 class="level-5 rectangle">Tidak Terkena Aturan<br>(Stemming Selesai)
                    <p> <?php foreach($nonSRtoken1 as $nsrt1){
                    echo $nsrt1 . ' ';}?></p>
                  </h4>
                </li>
                </li>
              </ol>
        </li>
      </ol>

      <h1 class="final rectangle">Hasil Akhir
      </h1>
      <ol class="level-3-wrapper">
            <li>
            <h3 class="level-5 rectangle">Sebelum Stemming
                <p><?php echo $docfold;?></p>
              </h3>
            <li>
            <h3 class="level-5 rectangle">Setelah Stemming
                <p><?php foreach($uniqueFinalToken as $ufinal){
                    echo $ufinal . ' ';}?></p>
              </h3>
        </li>
      </ol>
    </div>
</body>

<footer class="page-footer">
  <span>made by Kelompok 3</span>
</footer>