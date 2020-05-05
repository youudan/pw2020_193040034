<?php
require "Database.php";




if (isset($_GET['ep']) && $_GET['ep']) {

  switch ($_GET['ep']) {
    case 'semua-alat-musik':
      if (isset($_GET['limit']) && $_GET['limit']) {
        $limit = $_GET['limit'];
        $alat_musik = query("SELECT am.nama, am.slug, am.merk, am.gambar, am.deskripsi, am.created_by, am.created_at, jma.jenis, jma.tag, u.nama as nama_user, u.profile 
        FROM alat_musik am 
        JOIN jenis_alat_musik jma ON am.jenis_id=jma.id
        JOIN users u ON am.created_by=u.id
        WHERE am.deleted_at IS NULL
        ORDER BY am.created_at DESC
        LIMIT $limit
       ");
      } else {
        $alat_musik = query("SELECT am.nama, am.slug, am.merk, am.gambar, am.deskripsi, am.created_by, am.created_at, jma.jenis, jma.tag, u.nama as nama_user, u.profile 
        FROM alat_musik am 
        JOIN jenis_alat_musik jma ON am.jenis_id=jma.id
        JOIN users u ON am.created_by=u.id
        WHERE am.deleted_at IS NULL
       ");
      }

      break;
    case 'semua-alat-musik-sampah':

      $alat_musik = query("SELECT am.nama, am.slug, am.merk, am.gambar, am.deskripsi, am.created_by, am.created_at, jma.jenis, jma.tag, u.nama as nama_user, u.profile 
          FROM alat_musik am 
          JOIN jenis_alat_musik jma ON am.jenis_id=jma.id
          JOIN users u ON am.created_by=u.id
          WHERE am.deleted_at IS NOT NULL
         ");

      break;
    default:
      # code...
      break;
  }
  $data = [];
  foreach ($alat_musik as $am) {
    $data[] = [
      'nama' => $am['nama'],
      'slug' => $am['slug'],
      'merk' => $am['merk'],
      'gambar' => $am['gambar'],
      'deskripsi' => $am['deskripsi'],
      'created_at' => $am['created_at'],
      'jenis' => $am['jenis'],
      'tag' => $am['tag'],
      'nama_user' => $am['nama_user'],
      'profile' => $am['profile']
    ];
  }

  $json = [
    "status" => "success",
    "message" => "alat musik",
    "data" => [
      "alat_musik" => $data
    ]
  ];

  echo json_encode($json);
} else {
  echo "endpoint tidak valid";
}
