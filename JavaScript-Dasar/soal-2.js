// Buatlah kalkulator dengan menggunakan javascript serta buat lah menggunakan arrow function dan spread operator yang terdiri dari (+-/*%)
const readline = require('readline');

const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

const calculator = (operator, num1, num2) => {
    switch (operator) {
        case '+':
            return num1 + num2;
        case '-':
            return num1 - num2;
        case '*':
            return num1 * num2;
        case '/':
            return num1 / num2;
        case '%':
            return num1 % num2;
        default:
            return "Operator tidak valid";
    }
};

rl.question("Masukkan operator (+, -, *, /, %): ", (operator) => {
    rl.question("Masukkan angka pertama: ", (num1) => {
        rl.question("Masukkan angka kedua: ", (num2) => {
            num1 = parseFloat(num1);
            num2 = parseFloat(num2);
            console.log("Hasil: ", calculator(operator, num1, num2));
            rl.close();
        });
    });
});