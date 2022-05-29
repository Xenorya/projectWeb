const quotes = [{
    quote: `"Failing to plan is planning to fail."`,
    writer: `– `
}, {
    quote: `"An hour of planning can save you 10 hours of doing."`,
    writer: `– `
}, {
    quote: `"A goal without a plan is just a wish."`,
    writer: `– `
}, {
    quote: `"here are dreamers and there are planners; the planners make their dreams come true."`,
    writer: `– `
}, {
    quote: `"The more the plans fail the more the planner's plan."`,
    writer: `– `
}, ]





let btn = document.querySelector("#Qbtn");

let quote = document.querySelector(".quote");

let writer = document.querySelector(".writer");






btn.addEventListener("click", function() {
    let random = Math.floor(Math.random() * quotes.length);
    
    
    quote.innerHTML = quotes[random].quote;

    
    writer.innerHTML = quotes[random].writer;
})