<table class="table table-bordered" style="text-align: center">

    @php
        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
        }
    @endphp
    
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Judul Film</th>
            <th>Harga Tiket / Orang</th>
            <th>Jumlah Penonton</th>
            <th>Sub Total</th>
            <th>Diskon</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($bookings as $booking)
        <tr>
            <td>{{$no}}</td>
            <td>{{$booking->name}}</td>
            <td>{{$booking->date}}</td>
            <td>{{$booking->film->title}}</td>
            <td>{{rupiah($booking->film->price)}}</td>
            <td>{{$booking->amount}}</td>
            <td>{{rupiah($booking->film->price * $booking->amount)}}</td>
            <td>
                <?php
                if($booking->amount>10){
                    $booking->discount = ($booking->film->price * $booking->amount) * 0.2;
                }
                elseif ($booking->amount<=10 && $booking->amount>=5) {
                    $booking->discount = ($booking->film->price * $booking->amount) * 0.1;
                }
                elseif ($booking->amount<5) {
                    $booking->discount = ($booking->film->price * $booking->amount) * 0;
                }
                ?>

                {{rupiah($booking->discount)}}
            </td>
            <td>{{rupiah($booking->film->price * $booking->amount - $booking->discount)}}</td>
        </tr>
        @php
            $no++;
        @endphp
        @endforeach
    </tbody>
</table>