
$(function () {

    $("input:file").change(function () {
        var file = this.files[0];
        uploadFile(file);
    });

    $('.addVariant').on("click", function() {
        let clone = $(".clone-variant").clone(true, true);
        clone.removeClass('d-none');
        clone.removeClass('clone-variant');
        $(".clone-here").append(clone);
    });

    $('.removeVariant').on("click", function() {
        $(this).closest('.remove-clone').remove()
    });


    /**
     * file upload
     * @param file 
     */
    function uploadFile(file) {
        var formData = new FormData();
        formData.append('formData', file);
        $.ajax({
            url: imageUploadUrl,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.card').removeClass('card d-none');
                $('#image-preview').attr('src', uploadPath + '/' + response.imageName);
                $("input[name=imageName]").val(response.imageName);
            }
        });
    }
});