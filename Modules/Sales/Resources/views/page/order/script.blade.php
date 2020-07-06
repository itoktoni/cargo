@push('javascript')
<script>

    
    $(document).ready(function() {    
        $('#from_id').change(function(e){
            var id = $("#from_id option:selected").val();
            $.ajax({
                url: '{{ route("customer_api") }}',
                method : 'POST',
                data : {id : id },
                success: function (result){
                    if(result){
                        $('#from_name').val(result.crm_customer_name);
                        $('#from_phone').val(result.crm_customer_phone);
                        $('#from_email').val(result.crm_customer_email);
                        $('#from_address').val(result.crm_customer_address);
                        $('#from_area').val(result.crm_customer_rajaongkir_area_id);
                        $("#from_area").trigger("chosen:updated");
                    }
                }
            });
        });

        $('#to_id').change(function(e){
            var id = $("#to_id option:selected").val();
            $.ajax({
                url: '{{ route("customer_api") }}',
                method : 'POST',
                data : {id : id },
                success: function (result){
                    if(result){
                        $('#to_name').val(result.crm_customer_name);
                        $('#to_phone').val(result.crm_customer_phone);
                        $('#to_email').val(result.crm_customer_email);
                        $('#to_address').val(result.crm_customer_address);
                        $('#to_area').val(result.crm_customer_rajaongkir_area_id);
                        $("#to_area").trigger("chosen:updated");
                    }
                }
            });
        });

        function cek_ongkir(){
            var from = $("#branch_area option:selected").val();
            var to = $("#to_area option:selected").val();
            var koli = $("#koli").val();
            var top = $("#top_id option:selected").val();
            var paket = $("#paket_id option:selected").val();
            
            var cost = $("#cost");
            var cost_add = $("#cost_add").val();
            var cost_total = $("#cost_total");

            var discount_id = $("#discount_id option:selected").val();
            var discount_add = $("#discount_add").val();
            var discount_total = $("#discount_total").val();
            
            var cost_sum = $("#cost_sum");
            
            if(from_id == ''){
                 new PNotify({
                    title: 'Informasi Area !',
                    text: 'Pilih Area Pengirim tidak boleh kosong !',
                    addclass: 'notification-danger',
                    icon: 'fa fa-bolt'
                });
            }
            else if(to_id == ''){
                 new PNotify({
                    title: 'Information Price !',
                    text: 'Pilih Area Penerima tidak boleh kosong !',
                    addclass: 'notification-danger',
                    icon: 'fa fa-bolt'
                });
            }
            else if(koli == ''){
                 new PNotify({
                    title: 'Information Price !',
                    text: 'Koli tidak boleh kosong !',
                    addclass: 'notification-danger',
                    icon: 'fa fa-bolt'
                });
            }
            else if(paket_id == ''){
                 new PNotify({
                    title: 'Information Price !',
                    text: 'Pilih paket tidak boleh kosong !',
                    addclass: 'notification-danger',
                    icon: 'fa fa-bolt'
                });
            }
            
            $.ajax({
                url: '{{ route("ongkir_api") }}',
                method : 'POST',
                data : {
                    from : from, 
                    to : to, 
                    koli : koli, 
                    paket : paket, 
                    top : top, 
                },
                success: function (result){
                    if(result){
                        if(result != 'false'){
                            cost.val(result);

                            if(cost_add != ''){
                                var result = parseInt(result) + parseInt(cost_add);
                            }

                            cost_total.val(result);
                            cost_sum.val(result);
                            console.log(result);
                        }
                    }
                }
            });
        }

        function total_add(){

            var cost = $("#cost").val();
            var cost_add = $("#cost_add").val();
            var cost_total = $("#cost_total");
            var cost_sum = $("#cost_sum");

            if(cost == ''){
                 new PNotify({
                    title: 'Information Price !',
                    text: 'Tentukan harga terlebih dahulu !',
                    addclass: 'notification-danger',
                    icon: 'fa fa-bolt'
                });
            }
            else{

                var total = parseInt(cost) + parseInt(cost_add);
                cost_total.val(total);
                cost_sum.val(total);
            }
        }

        function add_discount(){

            var discount = $("#discount option:selected").val();
            var discount_text = $("#discount option:selected").text();

            var cost_total = $("#cost_total").val();

            var cost_sum = $("#cost_sum");
            var discount_name = $("#discount_name");

            if(cost_total == ''){
                 new PNotify({
                    title: 'Information Price !',
                    text: 'Tentukan harga terlebih dahulu !',
                    addclass: 'notification-danger',
                    icon: 'fa fa-bolt'
                });
            }
            else if(discount == ''){
                discount_name.text('');
            }
            else{

                $.ajax({
                    url: '{{ route("discount_api") }}',
                    method : 'POST',
                    data : {
                        discount : discount, 
                        cost : cost_total, 
                    },
                    success: function (result){
                        if(result){
                            if(result != 'false'){

                                var discount_value = $('#discount_add'); 
                                discount_value.val(result);
                                discount_name.text(discount_text);

                                var sum = parseInt(cost_total) - parseInt(result);
                                cost_sum.val(sum);

                            }
                        }
                    }
                });
            }
        }

        function total_discount(){

            var discount_add = $("#discount_add").val();
            var cost_total = $("#cost_total").val();
            var cost_sum = $("#cost_sum");

            if(cost_total == ''){
                 new PNotify({
                    title: 'Information Price !',
                    text: 'Tentukan harga terlebih dahulu !',
                    addclass: 'notification-danger',
                    icon: 'fa fa-bolt'
                });
            }
            else{

                var sum = parseInt(cost_total) - parseInt(discount_add);
                cost_sum.val(sum);
                $("#discount").val('');
                $("#discount").trigger("chosen:updated");
            }
        }

        $('#paket_id').change(function(e){
            cek_ongkir();
        });

        $('#top_id').change(function(e){
            cek_ongkir();
        });

          $('#discount').change(function(e){
            add_discount();
        });

        $('#cost_add').keyup(function(e){
            total_add();
        });

        $('#discount_add').keyup(function(e){
            total_discount();
        });

        $('#koli').on('input',function(e){
            cek_ongkir();
        });

    });
</script>
@endpush