$(document).ready(function() {   
        $("#field_kapal").hide();
        $("#field_jenis").hide();
        $("#field_penumpang").hide();
        $("#field_pelabuhan").hide();
        $("#field_kelas").hide();
        $("#field_waktu").hide();
        $("#field_group").hide();
        $('#tb_user').hide();
        $('#tb_fakta').hide();
        $('#g_jenis').hide();
        $('#g_kapal').hide();
        $('#g_kelas').hide();
        $('#g_pelabuhan').hide();
        $('#g_penumpang').hide();
        $('#g_waktu').hide();
        $('#tb_jenis').click(function() {
            $("#field_jenis").toggle(this.checked);
            $('#id_jenis_tiket').hide();
            if (tb_jenis.checked == true) {
                $("#id_jenis_tiket").prop('checked', true);
                $("#field_group").toggle(this.checked);
                $('#g_jenis').show();
            }else{
                $("#id_jenis_tiket").prop('checked', false);
                $('#g_jenis').hide();
                $('#g_jenis').prop('checked', false);
            }
        });
        $('#tb_kapal').click(function() {
            $("#field_kapal").toggle(this.checked);
            $('#id_kapal').hide();
            if (tb_kapal.checked == true) {
                $("#id_kapal").prop('checked', true);
                $("#field_group").toggle(this.checked);
                $('#g_kapal').show();
            }else{
                $("#id_kapal").prop('checked', false);
                $('#g_kapal').hide();
                $('#g_kapal').prop('checked', false);
            }
        });
        $('#tb_penumpang').click(function() {
            $("#field_penumpang").toggle(this.checked);
            $('#id_tiket').hide();
            if (tb_penumpang.checked == true) {
                $("#id_tiket").prop('checked', true);
                $("#field_group").toggle(this.checked);
                $('#g_penumpang').show();
            }else{
                $("#id_tiket").prop('checked', false);
                $('#g_penumpang').hide();
                $('#g_penumpang').prop('checked', false);
            }
        });
        $('#tb_kelas').click(function() {
            $("#field_kelas").toggle(this.checked);
            $('#id_kelas_tiket').hide();
            if (tb_kelas.checked == true) {
                $("#id_kelas_tiket").prop('checked', true); 
                $("#field_group").toggle(this.checked);
                $('#g_kelas').show();
            }else{
                $("#id_kelas_tiket").prop('checked', false);
                $('#g_kelas').hide();
                $('#g_kelas').prop('checked', false);
            }
        });
        $('#tb_pelabuhan').click(function() {
            $("#field_pelabuhan").toggle(this.checked);
            $('#id_pelabuhan').hide();
            if (tb_pelabuhan.checked == true) {
                $("#id_pelabuhan").prop('checked', true);
                $("#field_group").toggle(this.checked);
                $('#g_pelabuhan').show();
            }else{
                $("#id_pelabuhan").prop('checked', false);
                $('#g_pelabuhan').hide();
                $('#g_pelabuhan').prop('checked', false);
            }
        });
        $('#tb_waktu').click(function() {
            $("#field_waktu").toggle(this.checked);
            $('#id_waktu').hide();
            if (tb_waktu.checked == true) {
                $("#id_waktu").prop('checked', true);
                $("#field_group").toggle(this.checked);
                $('#g_waktu').show();
            }else{
                $("#id_waktu").prop('checked', false);
                $('#g_waktu').hide();
                $('#g_waktu').prop('checked', false);
            }
        });
    });