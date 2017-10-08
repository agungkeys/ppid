

<script>
    page.pageDestination("Beranda")
</script>
<section class="wrapper">
    <div class="row">
      <div class="col-md-12">
          <section class="panel">
              <div class="panel-body profile-information">
                 <div class="col-md-3">
                     <div class="profile-pic text-center">
                         <img src="images/user-icon.jpg" alt=""/>

                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="profile-desk">
                         <h1><?php echo $fn; ?></h1>
                         <span class="text-muted">sebagai: <?php echo $level ?></span>
                         <p>
                             Selamat datang, Admin anda login sebagai admin Dinas Perpajakan. manfaatkan halaman admin ini sebaik mungkin jika ada yang kurang jelas dimohon sangat untuk bertanya kepada IT Support PPID Jember.
                         </p>
                         <!-- <a href="#" class="btn btn-primary">View Profile</a> -->
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="profile-statistics">
                         <h1><?php $tgl=date('d F Y'); echo $tgl; ?></h1>
                         <p>Waktu Server: &nbsp;</p><p id="jam" style="margin: 0px;font-weight: normal;"></p>
                         <!-- <h1>$5,61,240</h1>
                         <p>This Week Earn</p> -->
                         <!-- <ul>
                             <li>
                                 <a href="#">
                                     <i class="fa fa-facebook"></i>
                                 </a>
                             </li>
                             <li class="active">
                                 <a href="#">
                                     <i class="fa fa-twitter"></i>
                                 </a>
                             </li>
                             <li>
                                 <a href="#">
                                     <i class="fa fa-google-plus"></i>
                                 </a>
                             </li>
                         </ul> -->
                     </div>
                 </div>
              </div>
          </section>
      </div>
</section>
<script type="text/javascript">
    function startTime(){
        var today=new Date();
        var h=today.getHours();
        var m=today.getMinutes();
        var s=today.getSeconds();
        // add a zero in front of numbers<10<br>
        m=checkTime(m);
        s=checkTime(s);
        document.getElementById('jam').innerHTML=h+":"+m+":"+s;
        t=setTimeout(function(){startTime()},500);
      }
      
    function checkTime(i){
      if (i<10) {i="0" + i;} return i;
    }
    $(document).ready(function(){
        startTime();
    })

</script>