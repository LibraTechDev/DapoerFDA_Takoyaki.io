<section class="subscribe_section">
    <div class="container-fuild">
        <div class="box">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="subscribe_form ">
                        <div class="heading_container heading_center">
                            <h3>Subscribe Untuk Dapatkan Kode Voucher</h3>
                        </div>
                        <p>Dapatkan Berbagai Voucher Untuk Pengguna Baru dan Pelanggan Tetap</p>

                        <form action="{{url('add_email')}}" method="POST">
                            @csrf
                            <input type="text" name="subscribe" placeholder="Enter your email">
                            <button type="submit">Subscribe</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>