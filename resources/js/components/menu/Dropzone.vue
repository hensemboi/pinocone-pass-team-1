<template>
    <div class="dropzone" 
        @dragenter.prevent="OnDragEnter" 
        @dragleave.prevent="OnDragLeave"
        @dragover.prevent
        @drop.prevent="onDrop"
        :class="{ dragging: isDragging }">

        <div class="upload-control" v-show="images.length">
             <label for="dropzoneFile">Select file</label>
        </div>

         <div v-show="!images.length" class="dzstyle">
            <i class="fa fa-cloud-upload"></i>
            <p>Drag or Drop File</p>
            <div>OR</div>
            <label for="dropzoneFile">Select File</label>
            <input type="file" id="dropzoneFile" class="dropzoneFile" @change="onInputChange" multiple/>
         </div>

        <div class="images-preview" v-show="images.length">
            <div class="img-wrapper" v-for="(image, index) in images" :key="index">
                <img :src="image" :alt="`DropZone ${index}`">
                <div class="details">
                    <span class="name" v-text="files[index].name"></span>
                </div>
            </div>
            
        </div>
        <div class="images-preview" v-for="image in menuImages">
            <div class="img-wrapper">
            <img  :src="image.imageUrl" :alt="`DropZone ${index}`">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:["menuImages"],
    name: "Dropzone",
    data: () => ({
        isDragging: false,
        dragCount: 0,
        files: [],
        images: []
    }),
    methods: {
    OnDragEnter(e) {
        e.preventDefault();
        
        this.dragCount++;
        this.isDragging = true;
        return false;
     },
    OnDragLeave(e) {
        e.preventDefault();
        this.dragCount--;
        if (this.dragCount <= 0)
            this.isDragging = false;
    },
    onInputChange(e) {
            const files = e.target.files;
            Array.from(files).forEach(file => this.addImage(file));
        },
    onDrop(e) {
        e.preventDefault();
        e.stopPropagation();
        this.isDragging = false;
        const files = e.dataTransfer.files;
        Array.from(files).forEach(file => this.addImage(file));
    },
    addImage(file) {
        if (!file.type.match('image.*')) {
            this.$toastr.e(`${file.name} is not an image`);
            return;
        }
        this.files.push(file);
        
        const reader = new FileReader();
        reader.onload = (e) => this.images.push(e.target.result);
        reader.readAsDataURL(file);
        
        this.$emit('addedFile', this.files);
        this.$emit('addedImage', this.images);
    },
  }
}
</script>

<style scoped>
.dropzone {
    width: 100%;
    padding: 40px 15px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    row-gap: 5px;
    border: 1px dashed grey;
    border-radius: 5px;
    font-size: 14px;
    color: grey;
    position: relative;
    background-color: #fff;
    transition: 0.2s ease all;
}
label {
    padding: 8px 12px;
    color: #fff;
    background-color: Grey;
    transition: 0.2s ease all;
    border-radius: 4px;
    cursor: pointer;
  }
label:hover {
    background-color: #fed531;
  }
input {
    display: none;
  }
i {
    font-size: 25px;
}
.dragging {
    color: #fff;
    border-color: #fff;
    background-color: #fed531;
}
.dragging label {
    background-color: #fff;
    color: #fed531;
}
.dzstyle{
    text-align: center;
}
.images-preview {
    display: flex;
    flex-wrap: wrap;
    margin-top: 20px;
}
.img-wrapper {
    width: 160px;
    display: flex;
    padding: 5px;
    flex-direction: column;
    margin: 10px;
    height: 150px;
    justify-content: space-between;
    background: #fff;
    box-shadow: 5px 5px 20px #3e3737;
}

img{
    max-height: 105px;
}
 .upload-control {
        position: absolute;
        width: 100%;
        background: lightgray;
        top: 0;
        left: 0;
        border-top-left-radius: 7px;
        border-top-right-radius: 7px;
        padding: 10px;
        padding-bottom: 4px;
        text-align: right;
 }
</style>