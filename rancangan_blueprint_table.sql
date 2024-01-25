create table nasabah(
    id INT(14) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nik varchar(15) NULL,
    tttl varchar(14) NULL,
    no_anggota INT NULL,
    nama VARCHAR(255) NULL,
    jk enum("L", "P") NULL,
    alamat text,
    rt_rw VARCHAR(20),
    kelurahan VARCHAR(50),
    kecamatan VARCHAR(50),
    kab_kota VARCHAR(50),
);
CREATE TABLE transaksi_gadai (
    id INT(14) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_nasabah int(14) NULL,
    no_kwitansi INT,
    no_faktur INT,
    no_anggota INT,
    tanggal DATE,
    jatuh_tempo DATE,
    maks_pinjaman DECIMAL(18, 2),
    jumlah_pinjaman DECIMAL(18, 2),
    administrasi DECIMAL(18, 2),
    jasa_titip DECIMAL(18, 2),
    total DECIMAL(18, 2),
    menyetujui_nasabah VARCHAR(255),
    menyetujui_staff_sgi VARCHAR(255), 
    pelunasan DECIMAL(18,4),
    perpajangan DECIMAL(18,4),  
    durasi_pelunasan DECIMAL(18,4),
    created_at date NULL,
    updated_at date NULL,
    user_id int(14) NULL
);
create table barang(
    id int(14) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    kategori_barang_id int(14) NOT NULL,
    kode VARCHAR(255),
    nama_barang VARCHAR(255),
    no_imei VARCHAR(20),
    merk VARCHAR(255),
    type VARCHAR(50),
    keluaran varchar(140),
    Kelengkapan VARCHAR(255),
    created_at date NULL,
    updated_at date NULL,
    user_id int(14) NULL
);
CREATE TABLE kategori_barang (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    kode_kategori VARCHAR(50) NOT NULL,
    nama_kategori VARCHAR(50) NOT NULL,
);