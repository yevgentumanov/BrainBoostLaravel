export class Random {
    static randomInt(min = 0, max = 1) {
        Math.floor(Math.random() * (max - min + 1)) + min;
    }
}