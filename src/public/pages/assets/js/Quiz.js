//global variables
let Max;
let counter=1;
const nextBtn = document.querySelector("#next");
let QUESTIONS=[];
const userAnswers=[];
const container = document.querySelector("#questionContainer");
const TIME_COUNTER=30;
const ID =nextBtn.getAttribute('data-id');
const URL='/api/'
let  idInterval;



const generateQuestionMarkup=function (question){
    const container = document.querySelector("#questionContainer");
    container.innerHTML=""

    const markup=` <section class="questions-section mt-5  mb-5" style="height:85 vh !important;" >
            <a href="/" class=" d-block h6 ms-auto home-btn"><i class="fas fa-home"></i></a>
            <div class="container">
                <h2 class="section-title">Questions</h2>
                <div class="row">
                    <div class="question d-flex">
                        <h2 class="question">${question.title}  </h2>

                        <h4 class="question-count">${counter}/10</h4>

                    </div>
                    <div class="counter_wrap">
                        <div class="timer_wrap">
                            Time Left
                            <div class="timer">30</div>
                        </div>

                    </div>
                    <div class="answers-section">
                        <div class="">
                            <input class="form-check-input  answer_input" type="radio" name="flexRadioDefault" data-answer="a" id="answer-1">
                            <label for="answer-1">
                                ${question.a}
                            </label>
                        </div>
                        <div class="">
                            <input class="form-check-input answer_input" type="radio" name="flexRadioDefault" data-answer="b" id="answer-2">
                            <label for="answer-2">
                                ${question.b}
                            </label>
                        </div>
                        <div class="">
                            <input class="form-check-input answer_input" type="radio" name="flexRadioDefault" data-answer="c" id="answer-3">
                            <label for="answer-3">
                                ${question.c}
                            </label>
                        </div>
                        <div class="">
                            <input class="form-check-input answer_input" type="radio" name="flexRadioDefault" data-answer="d" id="answer-4">
                            <label for="answer-4">
                                ${question.d}
                            </label>
                        </div>
                    </div>

                </div>

            </div>
            <div class=" d-flex align-items-end justify-content-center w-100">

        <button id="next"  class="btn mt-4 mx-3 px-5 py-2 btn-primary btn-lg ms-auto">next</button>
            </div>
        </section>`
    container.insertAdjacentHTML("afterbegin", markup);
}

const storeCounter=(counter)=>{
    sessionStorage.setItem('counter',counter.toString());
}

/*
Returns the input checked or return false

 */
const inputCheck=()=>{
    const inputs = document.querySelectorAll(".form-check-input");
    let inputChecked=false;
    inputs.forEach((input) => {
        if (input.checked) {

             inputChecked=input;

        }

    });
    return inputChecked
}
const storeAnswer=()=>{
    if(counter<=1)return;
    const input=inputCheck();
    if(!input){
        userAnswers.push(0);
        return
    }

    const userAnswer = input.getAttribute('data-answer');
    userAnswers.push(userAnswer);
    sessionStorage.setItem(`question${counter - 1}`, userAnswer);
}

const quizLogic=()=>{
    //store the answer
    storeAnswer();


    //the end of the exam
    if(counter>=Max+1){
        postAnswers().then((res=>{
            if(res.request==="succeeded"){
                window.location.replace(`../results/${ID}`);
            }
        }))
        return
    }
    generateQuestionMarkup(QUESTIONS[counter-1])
    counter++;
    setTimer();

}

const setTimer = () => {
    const timer = document.querySelector(".timer");
    clearInterval(idInterval);
    let timeCounter=TIME_COUNTER;
    idInterval=setInterval(() => {

        //when the quiz ended
        if(counter===Max+1 && timeCounter===-1){
            clearInterval(idInterval);
            quizLogic();
            return;


        }


        if (timeCounter === -1) {
           quizLogic();


        }


        timer.textContent = `${timeCounter}`;
        timeCounter--;
    }, 1000);
};



const startQuiz= ()=> {
    container.addEventListener('click', function (e) {
        const nextBtn = document.querySelector("#next");
        if (e.target !== nextBtn) return;
        quizLogic();
    })
}

const fetchQuestions=()=>{

    //fetch all questions
    return fetch(URL+ID)
        .then((res) => res.json())
        .then((questions)    => questions )

}

const storeQuestions=()=>{
    fetchQuestions().then(questions=>sessionStorage.setItem('questions',JSON.stringify(questions)))
}
//THIS FUNCTION NEEDS REFACTORING
const generateQuestions=()=>{
    fetchQuestions().then(questions=>{
        QUESTIONS=questions;
        Max=QUESTIONS.length;
         startQuiz();
        storeQuestions();





    })

}

//
generateQuestions()

const getQuestionsID=()=>{
    const questionIds=[];
    QUESTIONS.forEach(question=>questionIds.push(Number(question.id)))
    return questionIds;
}
const postAnswers=()=>{
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const options={
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": token
        },
        method: 'post',
        credentials: "same-origin",
        body:JSON.stringify({
            answers:userAnswers,
            exam_id:ID,
            ids    :getQuestionsID()
        })
    }

    return fetch(URL,options ).then(response=>response.json())


        .catch(function(error) {
            console.log(error);
        });
}





//-----------------------------------
