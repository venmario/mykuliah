$(function () {
  $("body").on("click", ".row-matkul", function () {
    $("#deskripsiModal").modal("show");

    const id = $(this).data("id");
    $.ajax({
      url: "http://localhost/daftarmatkul/public/matkul/getdetail/",
      data: { id: id },
      dataType: "json",
      method: "post",
      success: function (data) {
        $("#matkulTitle").html(data.nama);
        $("#idmatkul").html("Id : " + data.id);
        $("#jenismatkul").html("Jenis : " + data.jenis);
        $("#prasyaratmatkul").html(data.prasyarat);
        $("#sksmatkul").html("SKS : " + data.sks);
        $("#deskripsimatkul").html(data.deskripsi);
      },
    });
  });

  $("body").on("click", "#tambahMatkul", function () {
    $("form").attr("action", "http://localhost/daftarmatkul/public/matkul/tambah");
    $("#modalTitle").html("Tambah Matkul");
    $("#inputNama").val("");
    $("#inputId").val("");
    $("#inputId").attr("readonly", false);
    $("#inputPrasyarat").val("");
    $("#deskripsiArea").html("Belum ada deskripsi");
    $("#btndelete").html("Close");
    $("#btndelete").removeClass("btn-danger");
    $("#btndelete").removeClass("btn-secondary");
    $("#btndelete").addClass("btn-secondary");
    $("#btndelete").removeAttr("data-bs-target");
    $("#btndelete").removeAttr("data-bs-toggle");
  });

  $("body").on("click", ".row-matkul-edit", function () {
    $("#tambahMatkulModal").modal("show");

    const id = $(this).data("id");
    $.ajax({
      url: "http://localhost/daftarmatkul/public/matkul/getdetail/",
      data: { id: id },
      dataType: "json",
      method: "post",
      success: function (data) {
        $("form").attr("action", "http://localhost/daftarmatkul/public/matkul/edit");
        $("#modalTitle").html(data.nama);
        $("#inputNama").val(data.nama);
        $("#inputId").val(data.id);
        $("#inputId").attr("readonly", true);
        $("#selectJenis").val(data.idjenis);
        $("#selectSks").val(data.idsks);
        $("#inputPrasyarat").val(data.prasyarat);
        $("#deskripsiArea").html(data.deskripsi);
        $("#btndelete").removeClass("btn-secondary");
        $("#btndelete").removeClass("btn-danger");
        $("#btndelete").addClass("btn-danger");
        $("#btndelete").html("Delete");
        $("#btndelete").attr("data-bs-target", "#modalConfirm");
        $("#btndelete").attr("data-bs-toggle", "modal");
      },
    });
  });

  function refresh() {
    const namaMatkul = $("#cariMatkul").val();
    const idjenis = $("#comboJenis").val();
    const idsks = $("#comboSks").val();

    $.ajax({
      url: "http://localhost/daftarmatkul/public/matkul/getmatkultertentu/",
      data: { idjenis: idjenis, idsks: idsks, namaMatkul: namaMatkul },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        data.forEach((e) => {
          $("#comboMatkul").append('<option value="' + e["id"] + '">' + e["id"] + " - " + e["nama"] + "</option>");
        });
        $("tbody").empty();
        if ($("tbody").hasClass("edit")) {
          data.forEach((e) => {
            $("tbody").append("<tr class='row-matkul-edit cursor-pointer' data-id=" + e["id"] + "><th scope='row'>" + e["id"] + "</th><td>" + e["nama"] + "</td><td>" + e["jenis"] + "</td><td>" + e["sks"] + "</td></tr>");
          });
        } else {
          data.forEach((e) => {
            $("tbody").append("<tr class='row-matkul cursor-pointer' data-id=" + e["id"] + "><th scope='row'>" + e["id"] + "</th><td>" + e["nama"] + "</td><td>" + e["jenis"] + "</td><td>" + e["sks"] + "</td></tr>");
          });
        }
      },
    });
  }

  $("#cariMatkul").on("keyup", function () {
    refresh();
  });

  $("#comboJenis").change(function () {
    refresh();
  });

  $("#comboSks").change(function () {
    refresh();
  });
  $.ajax({
    url: "http://localhost/daftarmatkul/public/matkul/getjenis/",
    dataType: "json",
    method: "post",
    success: function (data) {
      for (let i = 0; i < data.length; i++) {
        $("#comboJenis").append('<option value="' + data[i].id + '">' + data[i].nama + "</option>");
        $("#selectJenis").append('<option value="' + data[i].id + '">' + data[i].nama + "</option>");
      }
    },
  });

  $.ajax({
    url: "http://localhost/daftarmatkul/public/matkul/getsks/",
    dataType: "json",
    method: "post",
    success: function (data) {
      for (let i = 0; i < data.length; i++) {
        $("#comboSks").append('<option value="' + data[i].id + '">' + data[i].jumlah_sks + "</option>");
        $("#selectSks").append('<option value="' + data[i].id + '">' + data[i].jumlah_sks + "</option>");
      }
    },
  });

  $("body").on("click", "#buttondelete", function () {
    idmatkul = $("#inputId").val();
    $.ajax({
      url: "http://localhost/daftarmatkul/public/matkul/delete/",
      data: { idmatkul: idmatkul },
      dataType: "text",
      method: "post",
      success: function () {
        location.reload(true);
      },
    });
  });

  $("#comboJenisPerwalian").change(function () {
    const idjenis = $("#comboJenisPerwalian").val();
    $("#comboMatkul").empty();
    $.ajax({
      url: "http://localhost/daftarmatkul/public/matkul/getmatkultertentu/",
      data: { idjenis: idjenis, idsks: "", namaMatkul: "" },
      dataType: "json",
      method: "post",
      success: function (data) {
        data.forEach((e) => {
          $("#comboMatkul").append("<option val=" + e["id"] + ">" + e["id"] + " - " + e["nama"] + "</option>");
        });
      },
    });
  });

  $("body").on("click", "#btnCariJadwal", function () {
    $("#btnpilih").removeClass("visually-hidden");
    const idmatkul = $("#comboMatkul").val();

    $.ajax({
      url: "http://localhost/daftarmatkul/public/akademik/getjadwalmatkul/",
      method: "post",
      data: { idmatkul: idmatkul },
      dataType: "json",
      success: function (data) {
        $("#comboKP").empty();
        data.forEach((e) => {
          $("#comboKP").append("<option value=" + e["idkp"] + ">" + e["kp"] + "</option>");
        });
        idkp = $("#comboKP").val();
        getJadwalMatkulByKP(idmatkul, idkp);
      },
    });
    $.ajax({
      url: "http://localhost/daftarmatkul/public/matkul/getmatkulbyid/",
      method: "post",
      dataType: "json",
      data: { id: idmatkul },
      success: function (data) {
        const arrUjian = data.ujian.split(":");
        $("#labelUjian").html(arrUjian[0] + " " + arrUjian[1] + " " + arrUjian[2]);
      },
    });
  });

  function getJadwalMatkulByKP(idmatkul, idkp) {
    $("#labelJadwal").removeClass("visually-hidden");
    $.ajax({
      url: "http://localhost/daftarmatkul/public/akademik/getjadwalmatkulbykp/",
      method: "post",
      data: { idmatkul: idmatkul, idkp: idkp },
      dataType: "json",
      success: function (data) {
        $("#labelJadwal").html(data["hari"] + " " + data["jam_mulai"] + " - " + data["jam_selesai"]);
      },
    });
  }

  $("#comboKP").change(function () {
    const idmatkul = $("#comboMatkul").val();
    const idkp = $("#comboKP").val();
    getJadwalMatkulByKP(idmatkul, idkp);
  });

  const jadwalUjianArray = [];
  $("body").on("click", "#btnpilih", function () {
    const labelUjian = $("#labelUjian").html();
    const jdwlUjianSplited = labelUjian.split(" ");
    const strUjian = jdwlUjianSplited[2] + ":" + jdwlUjianSplited[3] + ":" + jdwlUjianSplited[4];
    let ujianBertabrakan = false;
    for (let i = 0; i < jadwalUjianArray.length; i++) {
      if (jadwalUjianArray[i] == strUjian) {
        ujianBertabrakan = true;
        alert("Jadwal Bertabrakan");
        break;
      }
    }
    if (ujianBertabrakan == false) {
      jadwalUjianArray.push(strUjian);
    }
  });
});
