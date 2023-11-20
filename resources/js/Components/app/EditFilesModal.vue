<template>
    <modal :show="props.modelValue" @show="onShow" max-width="sm">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Edit File
            </h2>
            <div class="mt-6">
                <InputLabel for="ocr_text" value="OCR TExt" class="sr-only"/>

                <TextInput type="text"
                           ref="ocrInput"
                           id="ocr_text"
                           v-model="form.ocr_text"
                           :class="form.errors.ocr_text ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                           class="mt-1 block w-full"
                           placeholder="Edit OCR Text"
                           @keyup.enter="share"
                />

                <InputError :message="form.errors.ocr_text" class="mt-2"/>
                <Ckeditor v-model="form.ocr_text" :editor="editor" :config="editorConfig"/>
            </div>
            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal">Cancel</SecondaryButton>
                <PrimaryButton class="ml-3"
                               :class="{ 'opacity-25': form.processing }"
                               @click="share" :disable="form.processing">
                    Save
                </PrimaryButton>
            </div>
        </div>
    </modal>
</template>

<script setup>
// Imports
import Modal from "@/Components/Modal.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/Textarea.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {useForm, usePage} from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {nextTick, ref} from "vue";
import {showSuccessNotification} from "@/event-bus.js";
import ClassicEditor  from '@ckeditor/ckeditor5-vue';
import Ckeditor from "@ckeditor/ckeditor5-vue";
// Uses
const form = useForm({
    ocr_text: null,
    all: false,
    id: null,
    parent_id: null
})
const page = usePage();

// Refs
const ocrInput = ref(null)

const editorConfig = {
    toolbar: {
        items: [
            'heading',
            '|',
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            '|',
            'outdent',
            'indent',
            '|',
            'blockQuote',
            'insertTable',
            'mediaEmbed',
            'undo',
            'redo'
        ]
    },
    language: 'en',
    table: {
        contentToolbar: [
            'tableColumn',
            'tableRow',
            'mergeTableCells'
        ]
    },
    licenseKey: '',
    placeholder: 'Type the content here!'
};

const editor = ClassicEditor;
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
    form.parent_id = page.props.folder.id
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
        },
        onError: () => ocrInput.value.focus()
    })
}

function closeModal() {
    emit('update:modelValue')
    form.clearErrors();
    form.reset()
}

// Hooks
</script>

<style scoped>

</style>
