<div>
    {{-- The Master doesn't talk, he acts. --}}
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        //alert(content);
        $("#uids").val(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });

      let scanners = new Instascan.Scanner({ video: document.getElementById('previews') });
      scanners.addListener('scan', function (contentk) {
        //alert(content);
        $("#uids").val(contentk);
      });
      Instascan.Camera.getCameras().then(function (camerak) {
        if (camerak.length > 0) {
          scanners.start(camerak[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
</script>
</div>
