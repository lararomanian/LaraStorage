<template>
    <EditModal :show="props.modelValue" @show="onShow" class="custom-modal"
        :class="{ 'sm:max-w-2xl sm:mx-auto sm:w-full': !customStyles }">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Edit File
            </h2>
            <div class="mt-6">
                <InputError :message="form.errors.ocr_text" class="mt-2" />
                <!-- Increase the height and apply styles from the input -->
                <ckeditor :editor="editor" v-model="form.ocr_text" :config="editorConfig" class="border rounded-md p-2"></ckeditor>
            </div>
            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal">Cancel</SecondaryButton>
                <PrimaryButton class="ml-3" :class="{ 'opacity-25': form.processing }" @click="share"
                    :disable="form.processing">
                    Save
                </PrimaryButton>
            </div>
        </div>
    </EditModal>
</template>

<script setup>
// Imports
import Modal from "@/Components/Modal.vue";
import EditModal from "@/Components/EditModal.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/Textarea.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { nextTick, ref } from "vue";
import { showSuccessNotification } from "@/event-bus.js";
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
// Uses
const form = useForm({
    ocr_text: null,
    all: false,
    id: null,
    parent_id: null
})
const page = usePage();
const customStyles = false;

const editor = ref(ClassicEditor);
// Refs
const ocrInput = ref(null)

const editorConfig = {
    // Customize CKEditor configurations if needed
    // For example, you can adjust the height of the editor here
    height: '80vh',
    width: '90vh',
    dataProcessor: {
        // Enable automatic HTML filtering to preserve styles
        htmlFilter: {
            add: (data) => {
                // Preserve all HTML attributes, including styles
                data.allowedAttributes['*'] = ['*'];
                return data;
            },
        },
    },

    // Other CKEditor options
    // You can add more options based on your requirements
    toolbar: {
        items: ['heading', '|', 'bold', 'italic', 'underline', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo'],
    },
    language: 'en',
};
// Props & Emit
const props = defineProps({
    modelValue: Boolean,
    allSelected: Boolean,
    selectedIds: Array,
    file: Object
})
const emit = defineEmits(['update:modelValue'])

// Computed

// Methods
function onShow() {
    form.ocr_text = props.file.ocr_text
    form.id = props.file.id
    nextTick(() => ocrInput.value.focus())
}

function share() {
    form.parent_id = props.file.parent_id ?? null
    console.log(props.selectedIds, props.allSelected);
    if (props.allSelected) {
        form.all = true;
    }
    form.post(route('file.updateOCR'), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal()
            form.reset();
            showSuccessNotification(`File has been updated successfully`)
            emit('refreshOcrText')
        },
        onError: () => ocrInput.value.focus()
    })
}

function closeModal() {
    emit('update:modelValue')
    form.clearErrors();
    form.reset()
    onShow()
}

// Hooks

</script>

<style scoped>
.custom-modal {
    width: 80%;
    margin: 20px auto;

}

.ck-editor__editable {
    min-height: 200px;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 8px;
}
</style>
