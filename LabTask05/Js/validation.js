let input_Text = document.getElementById('input_text');
let total_Character = document.getElementById('total_character');
let total_Word = document.getElementById('total_word');
let reverse_Text = document.getElementById('reverse_text');

function analyse() {
    let text = input_Text.value;
    if (text == "") {
        total_Character.value = 0;
        total_Word.value = 0;
        reverse_Text.value = "";
    }
    else {
        total_Character.value = text.length;

        let words = text.split(/\s+/);
        total_Word.value = words.length;

        let reversed = text.split("").reverse().join("");
        reverse_Text.value = reversed;
    }
}

function resetFields() {
    input_Text.value = "";
    total_Character.value = 0;
    total_Word.value = 0;
    reverse_Text.value = "";
}