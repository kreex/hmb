var todo = [
    "organize js files add html insertions "
];

var todo_string = "";

for(i = 1; i <= todo.length; ++i)
{
    todo_string += i + ". " + todo[i - 1] + "\n";
}

// alert(todo_string);