<template>
    <div class="dropzone" 
        @dragenter.prevent="OnDragEnter" 
        @dragleave.prevent="OnDragLeave"
        @dragover.prevent
        @drop.prevent="onDrop"
        :class="{ dragging: isDragging }">
        <i class="fa fa-cloud-upload"></i>
        <span>Drag or Drop File</span>
        <span>OR</span>
        <label for="dropzoneFile">Select File</label>
        <input type="file" id="dropzoneFile" class="dropzoneFile" />
    </div>
</template>

<script>
export default {
    name: "DropZone",
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
    height: 150px;
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

</style>