<!DOCTYPE html>
<html lang="en">

<head>
    <style></style>
</head>

<body>
    <h3>
        <center>Laporan Spooring Tahun {{ $tahun }}</center>
    </h3>
    <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>Id Booking</th>
            <th>Id Spooring</th>
            <th>Nama Pelanggan</th>
            <th>Kendaraan</th>
            <th>Tgl. Booking</th>
            <th>Stts. Spooring</th>
            <th>Tgl. Spooring Selesai</th>
            <th>Mekanik</th>
        </tr>
        @forelse ($spooring as $value)
            <tr>
                <td>{{ strtoupper($value->booking_id) }}</td>
                <td>{{ strtoupper($value->id) }}</td>
                <td>{{ ucwords($value->booking->fullname) }}</td>
                <td>{{ ucwords($value->booking->type) }} - ({{ strtoupper($value->booking->plat) }})</td>
                <td>{{ \Carbon\Carbon::parse($value->booking->bookingdate)->format('d M, Y') }}</td>
                <td>
                    @if ($value->booking->bookingstatus == 1)
                        Proses Spooring
                    @elseif($value->booking->bookingstatus == 2)
                        Konfirmasi Pelanggan
                    @elseif($value->booking->bookingstatus == 3)
                        Proses Pengerjaan Spooring
                    @elseif($value->booking->bookingstatus == 4)
                        Spooring Selesai
                    @elseif($value->booking->bookingstatus == 5)
                        Pelanggan Setuju
                    @elseif($value->booking->bookingstatus == 6)
                        Pelanggan Tidak Setuju
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($value->spooringfinish)->format('d M, Y') }}</td>
                <td>{{ ucwords($value->pengguna->fullname) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8" align="center"><strong>Data Tidak Ditemukan.</strong></td>
            </tr>
        @endforelse
    </table>
</body>

</html>
