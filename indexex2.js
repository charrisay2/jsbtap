function max(a, b) {
  return a > b ? a : b;
}
console.log(max(3, 7));
console.log(max(10, 5));


function isLandscape(width, height) {
  return width > height;
}
console.log(isLandscape(800, 600));
console.log(isLandscape(600, 800));


function zzBuzz(input) {
  if (typeof input !== 'number') return "Not a number";
  if (input % 3 === 0 && input % 5 === 0) return "FizzBuzz";
  if (input % 3 === 0) return "Fizz";
  if (input % 5 === 0) return "Buzz";
  return input;
}
console.log(zzBuzz(15));
console.log(zzBuzz(9));
console.log(zzBuzz(10));
console.log(zzBuzz("a"));


function checkSpeed(speed) {
  const SPEED_LIMIT = 70;
  const KM_PER_POINT = 5;

  if (speed <= SPEED_LIMIT) {
    console.log("OK");
    return;
  }

  const points = Math.floor((speed - SPEED_LIMIT) / KM_PER_POINT);

  if (points >= 12) {
    console.log("License suspended");
  } else {
    console.log("Points:", points);
  }
}
checkSpeed(70);
checkSpeed(80);
checkSpeed(135);


function showNumbers(limit) {
  for (let i = 0; i <= limit; i++) {
    const label = (i % 2 === 0) ? "EVEN" : "ODD";
    console.log(i, label);
  }
}
showNumbers(5);


function countTruthy(array) {
  let count = 0;
  for (let value of array) {
    if (value) count++;
  }
  return count;
}
console.log(countTruthy([0, null, undefined, '', 2, 3]));


function showProperties(obj) {
  for (let key in obj) {
    if (typeof obj[key] === 'string') {
      console.log(key, obj[key]);
    }
  }
}
showProperties({
  title: "Book",
  year: 2024,
  author: "John",
  rating: 4.5
});


function calculateGrade(marks) {
  let sum = 0;
  for (let mark of marks) sum += mark;

  const avg = sum / marks.length;

  if (avg < 60) return "F";
  if (avg < 70) return "D";
  if (avg < 80) return "C";
  if (avg < 90) return "B";
  return "A";
}
console.log(calculateGrade([80, 80, 90]));


function showStars(rows) {
  let pattern = "";
  for (let i = 1; i <= rows; i++) {
    pattern += "*";
    console.log(pattern);
  }
}
showStars(5);


function showPrimes(limit) {
  for (let number = 2; number <= limit; number++) {
    if (isPrime(number)) {
      console.log(number);
    }
  }
}

function isPrime(number) {
  for (let factor = 2; factor < number; factor++) {
    if (number % factor === 0) return false;
  }
  return true;
}

showPrimes(20);
