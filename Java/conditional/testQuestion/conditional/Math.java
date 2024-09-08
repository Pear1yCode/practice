package Java.testQuestion.conditional;

import java.util.Scanner;

public class Math {
    public void oddEvenMethod() {

        System.out.println("숫자(mb 정수 ?)를 입력하세요.");
        Scanner oddEvensc = new Scanner(System.in);
        int oddEvenNumber = oddEvensc.nextInt();

        if (oddEvenNumber % 2 != 0) {
            System.out.println("입력하신 숫자는 홀수입니다.");
        } else if (oddEvenNumber == 0) {
            System.out.println("입력하신 숫자는 0 입니다.");
        } else {
            System.out.println("입력하신 숫자는 짝수입니다.");
        }
        System.out.println("프로그램을 종료합니다.");
    }
}
