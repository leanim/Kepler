const questions = [
    {
        question: "Which space telescope discovered thousands of exoplanets by observing transits?",
        answer: [
            {text: "Gaia (ESA)", correct: false},
            {text: "Kepler (NASA)", correct: true},
            {text: "TESS (NASA)", correct: false},
            {text: "CHEOPS (ESA))", correct: false},
        ]
    },
    {
        question: "What kind of stellar event results in a powerful explosion when a star dies?",
        answer: [
            {text: "A nova", correct: false},
            {text: "A red giant", correct: false},
            {text: "A neutron star", correct: false},
            {text: "A supernova", correct: true},
        ]
    },
    {
        question: "Why do we call some constellations by names like Orion or Ursa Major?",
        answer: [
            {text: "Ancient civilizations imagined shapes in the stars", correct: true},
            {text: "They were discovered recently by NASA", correct: false},
            {text: "Their stars are closer to Earth", correct: false},
            {text: "They are part of star clusters", correct: false},
        ]
    },
    {
        question: " What is the Kuiper Belt?",
        answer: [
            {text: "A band of stars around the Milky Way", correct: false},
            {text: " A region of icy objects beyond Neptune ", correct: true},
            {text: "A layer in Earth's atmosphere", correct: false},
            {text: "A dark region at the center of the galaxy", correct: false},
        ]
    },
    {
        question: "In space or radio communication, when someone says “Do you copy?”, what are they actually checking?",
        answer: [
            {text: "If the message was recorded for later", correct: false},
            {text: "If the other person is ready to speak", correct: false},
            {text: "If the signal strength is high", correct: false},
            {text: " If the other person received and understood the message", correct: true},
        ]
    },
    {
        question: " What is the “galactic cannibalism” theory?",
        answer: [
            {text: "A theory explaining why galaxies in clusters move faster than expected", correct: false},
            {text: "A theory that galaxies swap stars with each other", correct: false},
            {text: "A theory that larger galaxies may consume smaller galaxies through gravitational interaction", correct: true},
            {text: "A theory explaining why black holes are only found in the center of galaxies", correct: false},
        ]
    },
    {
        question: "What would happen if you fell into a black hole?",
        answer: [
            {text: "You’d be teleported to another galaxy", correct: false},
            {text: "You’d turn into a star", correct: false},
            {text: "You’d turn into spaghetti due to spaghettification", correct: true},
            {text: "You’d disappear forever, never to be seen again", correct: false},
        ]
    },
    {
        question: "What’s the name of the biggest star astronomers have ever found?",
        answer: [
            {text: "Sirius A", correct: false},
            {text: "Betelgeuse", correct: false},
            {text: "Alpha Centauri A", correct: false},
            {text: "UY Scuti", correct: true},
        ]
    },
    {
        question: "In ancient Roman mythology, who was the goddess of the Moon, often associated with hunting and the wild?",
        answer: [
            {text: "Venus", correct: false},
            {text: "Diana", correct: true},
            {text: "Athena", correct: false},
            {text: "Hera", correct: false},
        ]
    },
    {
        question: "Two powerful figures, one representing the Sun and the other the Moon, stand in eternal opposition. Which pair of deities reflects this cosmic duality?",
        answer: [
            {text: "Leona and Diana", correct: true},
            {text: "Zeus and Hera", correct: false},
            {text: "Ares and Athena", correct: false},
            {text: "Sol and Nocturne", correct: false},
        ]
    }
];

const questionElement = document.getElementById("question");
const answerElement = document.getElementById("answer"); 
const nextbtn = document.getElementById("nextbtn");

let currentQuestionIndex = 0;
let score = 0;
let selectedButton = null;

function startQuiz(){
    currentQuestionIndex = 0;
    score = 0;
    nextbtn.innerHTML = "Next";
    nextbtn.style.display = "none";
    showQuestion();
}

function showQuestion(){
    resetState();
    let currentQuestion = questions[currentQuestionIndex];
    questionElement.innerHTML = currentQuestion.question;

    currentQuestion.answer.forEach((ans) => {
        const button = document.createElement("button");
        button.innerHTML = ans.text;
        button.classList.add("btn");
        answerElement.appendChild(button);
        
        button.addEventListener("click", () => {
            if(selectedButton) {
                selectedButton.classList.remove("selected");
            }

            button.classList.add("selected");
            selectedButton = button;
            selectedAnswer = ans.correct;

            nextbtn.style.display = "block";
        });
    });
}

function resetState(){
    nextbtn.style.display = "none";
    selectedButton = null;
    selectedAnswer = null;
    while(answerElement.firstChild){
        answerElement.removeChild(answerElement.firstChild);
    }
}

nextbtn.addEventListener("click", () => {
    if(selectedAnswer === true) {
        score++;
    }
    
    currentQuestionIndex++;
    if(currentQuestionIndex < questions.length){
        showQuestion();
    } else {
        resetState();
        questionElement.innerHTML = `Your score: ${score}/${questions.length}`;
        nextbtn.innerHTML = "Try again";
        nextbtn.style.display = "block";
        nextbtn.onclick = startQuiz;
    }
});

startQuiz();