<!-- Footer Section -->
<div class="w3-container w3-dark-grey w3-center w3-padding-16">
    <p>All rights reserved | &copy; <?php echo date("Y"); ?></p>
</div>

<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/trumbowyg.min.js"></script>

<!-- Custom Script -->
<script>
    $(document).ready(function() {
        $('#description').trumbowyg({
            btns: [
                ['bold', 'italic', 'underline', 'strikethrough'],
                ['link'],
                ['unorderedList', 'orderedList'],
                ['removeformat']
            ]
        });
    });
</script>

</body>
