function main() {    
    const counterElem = document.getElementById('counter');
    const incrementBtn = document.getElementById('increment');
    const decrementBtn = document.getElementById('decrement');
    let counter = 0;

    function handleCounter(type = "increment") {
        if (type === "increment") {
            counter++;
        } else {
            // Asegurémonos de que el contador no sea negativo
            counter = Math.max(0, counter - 1);
        }
        counterElem.innerText = counter; 
    }

    incrementBtn.addEventListener('click', () => handleCounter("increment"));
    decrementBtn.addEventListener('click', () => handleCounter("decrement"));
}

document.addEventListener('DOMContentLoaded', main);