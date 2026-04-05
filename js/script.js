document.addEventListener('DOMContentLoaded', () => {

let questions = [];
let current = 0;
let score = 0;
let selected = null;

const questionBox = document.getElementById('question');
const optionsBox = document.getElementById('options');
const nextBtn = document.getElementById('nextBtn');

function loadQuestion() {

    if (current >= questions.length) {
        localStorage.setItem('score', score);
        window.location.href = 'result.html';
        return;
    }

    selected = null;
    const q = questions[current];
    questionBox.innerText = q.question;
    optionsBox.innerHTML = '';

    q.options.forEach((opt, index) => {
        const btn = document.createElement('button');
        btn.innerText = opt;

        btn.onclick = () => {
            selected = index;

            document.querySelectorAll('#options button')
                .forEach(b => b.classList.remove('selected'));

            btn.classList.add('selected');
        };

        optionsBox.appendChild(btn);
    });
}

nextBtn.addEventListener('click', () => {

    if (selected === null) {
        alert("Please select an option!");
        return;
    }

    if (selected == questions[current].correct) {
        score++;
    }

    current++;
    loadQuestion();   // 🔥 THIS was not working before due to id mismatch
});

fetch('php/get_questions.php')
    .then(res => res.json())
    .then(data => {
        questions = data;
        loadQuestion();
    })
    .catch(() => alert("Failed to load questions"));

});