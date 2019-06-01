var kata = "Get work done Faster and Better with Us";
var inkata = 0; // Index kata
var kecepatanKataMuncul = 200; //Kecepatan huruf yang akan kita munculkan

setInterval(function(){
      var target = $("#target"); //Inisialisasi div id target
      target.append(kata[inkata]); //Memasukkan kata satu persatu ke html
      inkata++; //index kata selalu bertambah
   }, kecepatanKataMuncul);  //Timing 200 ms perhuruf yang dima
   