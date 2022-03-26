function chartOptions(title,labels,data){
   return {
        type: 'bar',
            data: {
        labels:labels,
            datasets: [{
            label: title,
            data: data,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
        options: {

            scales: {
                y: {
                    beginAtZero: true,
                        title:{
                        display:true,
                            text:'#exams taken'
                    }
                },
                x:{
                    title:{
                        display:true,
                            text:'day of the week',

                    }

                }
            }
        }
    }
}

//first graph
function loadScoresChart(){
    fetch('/api/scores').then(data=> data.json()).then(data=>{
            const days=new Array(7).fill(0);

            data.forEach((score,i)=>{
                const day=new Date(score.created_at).getDay();
                days[day]++;


            })
            const labels= ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
            const ctx = document.getElementById('myChart').getContext('2d');
            const examsTakenChart = new Chart(ctx, chartOptions('exams taken per day',labels,days));


        }

    )
}
function loadExamsChart(){
    fetch('api/exams-taken').then(data=>data.json()).then(data=>{
        const exams=data.map(exam=>exam.count);
        const exam_names= data.map(exam=>exam.name);
        const ctx = document.getElementById('myChart1').getContext('2d');
        const examsChart=new Chart(ctx,chartOptions('exam vs number of times taken',exam_names,exams))

    })
}


window.addEventListener('load',()=>{
    loadExamsChart();
    loadScoresChart();
})
