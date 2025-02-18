//PROFILE FUNCTIONS
$('#form-update').on("submit", function(e) {
    e.preventDefault();
    var token = $('meta[name="csrf-token"]').attr('content');
    var form = new FormData($('#form-update')[0]);
    form.append('_token', token);

    for (var pair of form.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }

    $.ajax({
        type: "POST",
        url: "{{ url('profile/') }}" + "/{{ auth()->user()->id }}",
        data: form,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function(response) {
            console.log(response);

            alert(response.message);
            location.reload();
        },
        error: function(xhr, status, error) {

            if (xhr.responseJSON) {
                var errorMessages = '';
                Object.keys(xhr.responseJSON).forEach(function(key) {
                    const messages = xhr.responseJSON[key];
                    errorMessages += messages.join('\n') + '\n';
                });

                alert(errorMessages);
            } else {
                alert("An unknown error occurred. Please try again.");
            }
        }
    })
});

$('#avatar').change(function(event) {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#avatar-preview').attr('src', e.target.result).removeClass('hidden');
    }
    reader.readAsDataURL(event.target.files[0]);
});

// ALBUM FUNCTION
$('[data-modal-target="crud-modal"]').on('click', function() {
    $('#crud-modal h3').text('Tambah Album');
    $('#id').val('');
    $('#name').val('');
    $('#description').val('');
});

$('.form').on("submit", function(e) {
    e.preventDefault();

    var token = $('meta[name="csrf-token"]').attr('content');

    var url = "{{ url('album/') }}";
    if ($('#id').val()) {
        url += `/` + $('#id').val();
    }

    $.ajax({
        type: "POST",
        url: url,
        data: {
            name: $('#name').val(),
            description: $('#description').val(),
            _token: token
        },
        dataType: "json",
        success: function(response) {
            loadAlbumCards();
            alert('Berhasil menambah album');

        },
        error: function(xhr, status, error) {
            alert(xhr.responseJSON);
            console.log("Terjadi error:", xhr);
        }
    })
});

$('#album-section').on('click', '[data-element="btn_edit"]', function() {
    var id = $(this).data('value');
    $('#crud-modal h3').text('Edit Album');


    $.ajax({
        url: `{{ url('album/retrieve/${id}') }}`,
        type: "GET",
        dataType: "Json",
    }).done(function(response) {
        $('#id').val(`${response.data.id}`);
        $('#name').val(`${response.data.title}`);
        $('#description').val(response.data.description ?
            `${response.data.description}` : ``)
    }).catch(error => {
        console.log(error);
    });
});

$('#album-section').on('click', 'button[data-element=btn_delete]', function(e) {
    var _selectedID = $(this).data('value');
    var title = $(this).data('title');

    if (confirm(`Anda yakin ingin menghapus album ${title}?`)) {
        $.ajax({
            url: "{{ url('album') }}/" + _selectedID,
            method: "delete",
            data: {
                _token: "{{ csrf_token() }}"
            }
        }).done(function(response) {
            alert(response.message);
            loadAlbumCards();
        }).fail(function(error) {
            alert(`Error: ${error.statusText}`);
        });
    }

});

$('#order').on('change', function() {
    $('#sort').val('');
})

$('#order, #sort').on('change', function() {
    if ($('#order').val() != '' &&  $('#sort').val() != '') {
        loadPhotoCards();
    }
});

;

$('#image').change(function(event) {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#preview').attr('src', e.target.result).removeClass('hidden');
    }
    reader.readAsDataURL(event.target.files[0]);
});

function getAlbumOptions() {
    $.ajax({
        url: `{{ url('album/get_options') }}`,
        type: "GET",
        dataType: "Json",
    }).done(function(response) {
        $('#album').empty();

        $('#album').append('<option value="" selected>Select an album</option>');

        $.each(response.data, function(index, album) {
            $('#album').append('<option value="' + album.id + '">' + album.title +
                '</option>');
        });
    }).catch(error => {
        console.log(error);
    });
}

$('.form-photo').on("submit", function(e) {
    e.preventDefault();

    var token = $('meta[name="csrf-token"]').attr('content');

    var url = "{{ url('photo/') }}";
    if ($('#id').val()) {
        url += `/` + $('#id').val();
    }

    var formData = new FormData();

    formData.append('title', $('#photo-title').val());
    formData.append('description', $('#photo-description').val());
    formData.append('album', $('#album').val());
    formData.append('image', $('#image')[0].files[0] ? $('#image')[0].files[0] : "");
    formData.append('_token', token);

    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function(response) {
            loadPhotoCards();
            alert(response.message);
            $('#preview').attr('src', '').addClass('hidden');
        },
        error: function(xhr, status, error) {
            alert(xhr.responseJSON);
            console.log("Terjadi error:", xhr);
        }
    })
});

$('#photo-section').on('click', 'button[data-element=btn_delete]', function(e) {
    var _selectedID = $(this).data('value');
    var title = $(this).data('title');

    if (confirm(`Anda yakin ingin menghapus Photo ${title}?`)) {
        $.ajax({
            url: "{{ url('photo') }}/" + _selectedID,
            method: "delete",
            data: {
                _token: "{{ csrf_token() }}"
            }
        }).done(function(response) {
            alert(response.message);
            loadPhotoCards();
        }).fail(function(error) {
            alert(`Error: ${error.statusText}`);
        });
    }

});

$('#photo-section').on('click', '[data-element="btn_edit"]', function() {
    var id = $(this).data('value');

    $('#photo-modal h3').text('Edit Photo');
    $('#id').val('');
    $('#photo-title').val('');
    $('#photo-description').val('');
    $('#album').val('');

    $.ajax({
        url: `{{ url('photo/retrieve/${id}') }}`,
        type: "GET",
        dataType: "Json",
    }).done(function(response) {
        $('#preview').attr('src', `{{ url('storage') }}/${response.data.path}`)
            .removeClass('hidden');
        $('#id').val(`${response.data.id}`);
        $('#photo-title').val(`${response.data.title}`);
        $('#photo-description').val(response.data.description ?
            `${response.data.description}` : ``);
        $('#album').val(`${response.data.album_id}`);
    }).catch(error => {
        console.log(error);
    });
});
