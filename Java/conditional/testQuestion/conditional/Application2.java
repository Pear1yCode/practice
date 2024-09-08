package Java.testQuestion.conditional;

public class Application2 {
    public static void main(String[] args) {
        /*
        0~15 범위의 난수를 생성하고
        난수가 10이상일 경우 "당첨입니다." 10미만일 경우 "아쉽네요"를 반환하세요.
         */
        int randomNumber = (int)(java.lang.Math.random()* 15);
        if (randomNumber >= 10) {
            System.out.println("당첨입니다.");
        }
        else {
            System.out.println("아쉽네요.");
        }
        // swift 문으로도 해보자 !
    }
}
