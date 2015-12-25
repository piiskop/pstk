


var poem = [{
        word: "You",
        numberofWords: "3"
    },
    {
        word: "Me",
        numberofWords: "13"
    },
    {
        word: "Place",
        numberofWords: "10"
    },
    {
        word: "That",
        numberofWords: "7"
    },
    {
        word: "Take",
        numberofWords: "2"
    },
    {
        word: "One",
        numberofWords: "2"
    },
    {
        word: "Green",
        numberofWords: "1"
    }
];

for (property in poem) {
    console.log(property + ": " + poem[property]["word"]);
};

poem.forEach(function(value, index, array) {
    console.log(array[index].word);
});
	