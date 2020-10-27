<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-9 main-chart">
              <form class="" action="<?php echo base_url('first/insertreview') ?>" method="post" enctype="multipart/form-data" Multiple>
              <table border="0" class="table well">
                <thead>
                  <tr>
                    <td colspan="3"><h4><span class="fa fa-pencil-square"></span>&nbsp;เขียนโพสต์รีวิว</h4></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="3"><h5>ชื่อผู้เขียนโพสต์:&nbsp;&nbsp;<?php echo $this->session->userdata('M_fullname'); ?></h5>

                      <label for="exampleInputPassword1">เลือกประเภท</label>
                      <select name="C_id" class="form-control">
                      <?php
                        $query = $this->db->get('tb_category');
                        foreach ($query->result() as $row){
                        $id=$row->C_id;
                       ?>
                      <option value="<?php echo $row->C_id; ?>"><?php echo $row->C_name; ?></option>
                      <?php
                         }
                      ?>
                      </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="text" name="P_name" value="" class="form-control" placeholder="ชื่อสถานที่......">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <?php $this->load->helper('url') ?>
                      <script type="text/javascript" src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
                      <script>
                      tinymce.init({ selector:'textarea',
                      relative_urls : false,
                      remove_script_host : false,
                      plugins: [ "image ","responsivefilemanager"],
                      toolbar2: " image media | responsivefilemanager ",
                      image_advtab: true ,

                      external_filemanager_path:"<?php echo base_url('assets/filemanager/')?>",
                      filemanager_title:"Responsive Filemanager" ,
                      external_plugins: { "filemanager" : "<?php echo base_url('assets/filemanager/plugin.min.js')?>"}
                    
                       });
                       </script>
                       <textarea name="R_detail" rows="8" cols="80"></textarea>
                       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                       <!-- <input type="file" multiple id="R_img" name="R_img">
                         <div class="Thumbnail gallery" >

                         </div>
                       <script type="text/javascript">
                       $(function() { -->
  <!-- // Multiple images preview in browser -->
  <!-- var imagesPreview = function(input, placeToInsertImagePreview) {

      if (input.files) {
          var filesAmount = input.files.length;

          for (i = 0; i < filesAmount; i++) {
              var reader = new FileReader();

              reader.onload = function(event) {
                  $($.parseHTML('<img style="width: 250px; height: 180px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
              }

              reader.readAsDataURL(input.files[i]);
          }
      }

  };

  $('#R_img').on('change', function() {
      imagesPreview(this, 'div.gallery');
  });
});
                       </script> -->
                       <!-- <input id="R_img" type="file" multiple="" name="R_img" value="อัพโหลดรูปภาพ" onchange="PreviewImage();" />
                       <img id="uploadPreview" class="Thumbnail" multiple="" style="width: 250px; height: 180px;"/>
                       <img id="uploadPreview1" class="Thumbnail" multiple="" style="width: 250px; height: 180px;"/> -->
                      <!-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> -->
                      <!-- <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script> -->
                      <!-- <script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js')?>"></script> -->
                      <!-- <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
                      </textarea> -->
                      <!-- <script type="text/javascript" > -->
                      <!-- // Replace the <textarea id="editor1"> with a CKEditor
                      // instance, using default configuration.
                      CKEDITOR.replace( 'editor1' );
                      </script> -->
                      <!-- <input type="text" name="R_detail" value="" class="form-control" placeholder="เขียนอะไรบางอย่าง...">
                      อัพโหลดรูปภาพ <input id="R_img" type="file" name="R_img" onchange="PreviewImage();" />
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <img id="uploadPreview" class="Thumbnail" style="width: 250px; height: 180px;" /> -->
<!-- <script type="text/javascript">
function PreviewImage() {
        var oFReader = new FileReader();

          oFReader.readAsDataURL(document.getElementById("R_img").files[0]);
          oFReader.readAsDataURL(document.getElementById("R_img").files[1]);


        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
            document.getElementById("uploadPreview1").src = oFREvent.target.result;
        };
    };
</script> -->
                    </td>
                  </tr>
                  <tr hidden="">
                    <td><input type="text" name="M_fullname" value="<?php echo $this->session->userdata('M_fullname'); ?>" class="form-control"></td>
                  </tr>
                  <tr>
                    <td><button type="submit" name="button" style="float: right;">โพสต์</button></td>
                  </tr>
                </tbody>
              </table>
            </form>
      </div>
            <!-- /col-lg-9 END SECTION MIDDLE -->
