<!-- ================================================
    Scripts
    ================================================ -->

<!-- jQuery Library -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/jquery-1.11.2.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/materialize.min.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!-- sparkline -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/sparkline/sparkline-script.js"></script>

<!--jvectormap-->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/jvectormap/vectormap-script.js"></script>

<!-- data-tables -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/data-tables/data-tables-script.js"></script>

<!-- chartist -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/chartist-js/chartist.min.js"></script>

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins.min.js"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/custom-script.js"></script>

<!--prism-->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/prism/prism.js"></script>
</body>

<!-- <script>
    function setSatuan(el) {
        const price = $(el).find(':selected').data('price')
        var hargaSatuan = $(el).parent().nextAll().children('.price_pieces')
        $(hargaSatuan).val(price)
        setJumlah(el)
    }

    function setJumlah(el) {
        const allInput = $(el).parent().parent().children().children('input, select')
        const qty = $(allInput[2]).val()
        const hargaSatuan = $(allInput[3]).val()
        var jumlah = 0
        if (qty != 0 && hargaSatuan != 0) {
            jumlah = parseInt(qty) * parseInt(hargaSatuan)
        }
        $(allInput[5]).val(jumlah)
    }

    $('input[class=jumlah]').change(function(){
        alert('ganti')
        const allJumlah = querySelectorAll('.jumlah')
        var subTotal = 0
        for(let jumlah of allJumlah){
            console.log(jumlah)
        }
    })
</script> -->

</html>