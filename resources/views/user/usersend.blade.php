@extends('user.layout.main')
@section('incoming_msg')
<form action="{{url('/sendimage')}}/{{ $current_user->id }}/{{ $senduser->id }}" method="post" enctype="multipart/form-data">
@csrf
    <div class="form-group">    
        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="encryptedimg" id="inpFile" class="custom-file-input @error('encryptedimg') is-invalid @enderror">
                <label class="custom-file-label">Choose File </label>
                @error('encryptedimg')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class = "image-preview" id="imagePreview">
            <img src="" alt="Image Preview" class="image-preview__image">
            <span class="image-preview__default-text">Image Preview</span>
        </div>
    </div>
    <div class="form-group">
      <label>Message</label>
      <textarea class="form-control @error('message') is-invalid @enderror" name="message" placeholder="Enter your message here"></textarea>
        @error('message')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control @error('credentials') is-invalid @enderror" name="credentials" type="password" placeholder="Enter Password Here (Optional)">
      </div>

      <div class="form-group bi-form-controls">
        <div class="col-md-9 ">
            <button type="submit" class="btn btn-success"  value="save" name="action">Save </button>
        </div>
    </div>
  </form>
  <script>
    const inpFile = document.getElementById("inpFile");
    const previewContainer = document.getElementById("imagePreview");  
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText= previewContainer.querySelector(".image-preview__default-text");

    inpFile.addEventListener("change", function(){
      const file = this.files[0];
      // console.log(file);
      if(file){
        const reader = new FileReader();

        previewDefaultText.style.display = "none";
        previewImage.style.display = "block";
        reader.addEventListener("load",function(){
        //   console.log(this);
          previewImage.setAttribute("src",this.result);
        });
        reader.readAsDataURL(file);
      }
      else{
        previewDefaultText.style.display = null;
        previewImage.style.display = null;
        previewImage.setAttribute("src","");
      }

    });
  </script>
@endsection
