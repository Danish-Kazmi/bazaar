<template>
    <div>
        <ckeditor :editor="editor" v-model="textContent"></ckeditor>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
    props: {
        hasTextContent: String,
    },
    data() {
        return {
            textContent: this.hasTextContent || '', // Initialize with prop value if available
            editor: ClassicEditor,
        };
    },
    watch: {
        textContent(newValue) {
            // Emit the content only if it's not the same as the prop value
            if (newValue !== this.hasTextContent) {
                this.$emit('receiveContentData', newValue);
            }
        },
    },
}
</script>
