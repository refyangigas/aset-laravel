<?php
/// Migration untuk tabel 'asets'
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_seri');
            $table->string('foto')->nullable();
            $table->string('nama_aset');
            $table->bigInteger('jumlah');
            $table->enum('kategori', ['perabotan', 'elektronik', 'perlengkapan', 'transportasi']);
            $table->year('tahun');
            $table->integer('umur')->nullable();
            $table->bigInteger('harga')->nullable();
            $table->enum('status', ['aktif', 'non-aktif', 'rusak', 'perbaikan', 'disewakan', 'pemindahtanganan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asets');
    }
};
