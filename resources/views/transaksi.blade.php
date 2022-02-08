<html>
<body>
@if($errors->any)
    <ul>
    @foreach($errors->all() as $error)
        <li>
{{$error}}
</li>
    @endforeach
    </ul>
@endif
<form action="hitungTransaksi">
    <div>
        <span>Plat Nomor</span>
        <input type="input" id="platNomor" name="platNomor" value="{{old('platNomor')}}">
    </div>
    <div>
        <span>Jenis Kendaraan</span>
        <select id="jenis" name="jenis">
            <option value="-1">--Choose First--</option>
            @foreach($rates as $rate)
                <option value="${{$rate->hourlyrate}}">{{$rate->name}}
                </option>
            @endforeach
        </select>

    </div>
    <div>
{{--        {{$rates}}}--}}
        <span>Jam Masuk</span>
        <input type="datetime-local" id="jamMasuk" name="jamMasuk" value="{{old('jamMasuk')}}">
    </div>
    <div>
        <span>Jam Keluar</span>
        <input type="datetime-local" id="jamKeluar" name="jamKeluar" value="{{old('jamKeluar')}}">
    </div>
    <div>
        <input type="submit" id="submit" name="submit">
    </div>
    </div>


</form>
</body>
</html>
