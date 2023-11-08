// Функция priority позволяет получить значение приоритета для оператора. Возможные операторы: +, -, *, /.
function priority(operation) {
    if (operation == '+' || operation == '-') {
        return 1;
    } else {
        return 2;
    }
}

// Проверка, является ли строка str числом.
function isNumeric(str) {
    return /^\d+(\.\d+){0,1}$/.test(str);
}

// Проверка, является ли строка str цифрой.
function isDigit(str) {
    return /^\d{1}$/.test(str);
}

// Проверка, является ли строка str оператором.
function isOperation(str) {
    return /^[\+\-\*\/]{1}$/.test(str);
}

// Функция tokenize принимает один аргумент -- строку с арифметическим выражением и делит его на токены 
// (числа, операторы, скобки). Возвращаемое значение -- массив токенов.
function tokenize(str) {
    let tokens = [];
    let lastNumber = '';
    for (char of str) {
        if (isDigit(char) || char == '.') {
            lastNumber += char;
        } else {
            if (lastNumber.length > 0) {
                tokens.push(lastNumber);
                lastNumber = '';
            }
        }
        if (isOperation(char) || char == '(' || char == ')') {
            tokens.push(char);
        }
    }
    if (lastNumber.length > 0) {
        tokens.push(lastNumber);
    }
    return tokens;
}

// Функция compile принимает один аргумент -- строку
// с арифметическим выражением, записанным в инфиксной 
// нотации, и преобразует это выражение в обратную 
// польскую нотацию (ОПН). Возвращаемое значение -- 
// результат преобразования в виде строки, в которой 
// операторы и операнды отделены друг от друга пробелами. 
// Выражение может включать действительные числа, операторы 
// +, -, *, /, а также скобки. Все операторы бинарны и левоассоциативны.
function compile(str) {
    let out = [];
    let stack = [];
    for (token of tokenize(str)) {
        if (isNumeric(token)) {
            out.push(token);
        } else if (isOperation(token)) {
            while (stack.length > 0 && isOperation(stack[stack.length - 1]) && priority(stack[stack.length - 1]) >= priority(token)) {
                out.push(stack.pop());
            }
            stack.push(token);
        } else if (token == '(') {
            stack.push(token);
        } else if (token == ')') {
            while (stack.length > 0 && stack[stack.length - 1] != '(') {
                out.push(stack.pop());
            }
            stack.pop();
        }
    }
    while (stack.length > 0) {
        out.push(stack.pop());
    }
    return out.join(' ');
}

// Функция evaluate принимает один аргумент -- строку с арифметическим выражением, записанным в обратной польской нотации. Возвращаемое значение -- результат вычисления выражения. Выражение может включать действительные числа и операторы +, -, *, /.
function evaluate(str) {
    let stack = [];
    for (token of str.split(' ')) {
        if (isNumeric(token)) {
            stack.push(parseFloat(token));
        } else if (isOperation(token)) {
            let operand2 = stack.pop();
            let operand1 = stack.pop();
            if (token == '+') {
                stack.push(operand1 + operand2);
            } else if (token == '-') {
                stack.push(operand1 - operand2);
            } else if (token == '*') {
                stack.push(operand1 * operand2);
            } else if (token == '/') {
                stack.push(operand1 / operand2);
            }
        }
    }
    return stack.pop();
}

// Функция clickHandler предназначена для обработки событий клика по кнопкам калькулятора.
// По нажатию на кнопки с классами digit, operation и bracket на экране (элемент с классом screen) должны появляться соответствующие нажатой кнопке символы.
// По нажатию на кнопку с классом clear содержимое экрана должно очищаться.
// По нажатию на кнопку с классом result на экране должен появиться результат вычисления введённого выражения 
// с точностью до двух знаков после десятичного разделителя (точки).
function clickHandler(event) {
    const screen = document.querySelector('.screen');
 
    if (event.target.classList.contains('digit') || event.target.classList.contains('operation') || event.target.classList.contains('bracket')) {
        screen.textContent += event.target.textContent;
    } else if (event.target.classList.contains('clear')) {
        screen.textContent = '';
    } else if (event.target.classList.contains('result')) {
        const expression = screen.textContent;
        const rpnExpression = compile(expression); // Преобразуем в ОПН
        const result = evaluate(rpnExpression); // Вычисляем результат
        screen.textContent = result;
    }
}

// Назначьте нужные обработчики событий.
window.onload = function () {
    let buttons = document.querySelectorAll('.buttons');
    buttons[0].addEventListener('click', clickHandler);
}