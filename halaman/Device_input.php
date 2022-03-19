<?php
            echo $_SESSION['user_id'];
              ?>
    <div class="title"><strong>FORM</strong></div>
      <form method="post" action="">
        <div class="form-group">
          <label>id</label> 
          <input type="text" name="tid" value="<?=@$vid?>" class="form-control" placeholder="Input id!" required>
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input Nama Device disini!" required>
        </div>
        <div class="form-group">
          <label>Daya(Watt)</label>
          <input type="text" name="tdaya" value="<?=@$vdaya?>" class="form-control" placeholder="Input Nama Device disini!" required>
        </div>
        <div class="form-group">
          <label>Jumlah</label>
          <input type="text" name="tjumlah" value="<?=@$vjumlah?>" class="form-control" placeholder="Input Nama Device disini!" required>
        </div>
        <div class="form-group">
          <label>Jam</label>
          <input type="text" name="tjam" value="<?=@$vjam?>" class="form-control" placeholder="Input Nama Device disini!" required>
        </div>
        <div class="form-group">
          <label>Prioritas</label>
          <input type="text" name="tprioritas" value="<?=@$vprioritas?>" class="form-control" placeholder="Input Nama Device disini!" required>
        </div>
        <button type="submit" class="btn btn-outline-primary" name="bsimpan">Simpan</button>
        <button type="reset" class="btn btn-outline-warning" name="breset">Kosongkan</button>

      </form>
