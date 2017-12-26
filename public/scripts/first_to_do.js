var todo = [
    "add category picker",
    "special window for transaction adding",
    "set temporary color pallet"
];

var todo_string = "";

for(i = 1; i <= todo.length; ++i)
{
    todo_string += i + ". " + todo[i - 1] + "\n";
}

alert(todo_string);
