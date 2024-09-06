package question.Java.conditional;

import java.util.Scanner;

public class Application5 {
    public static void main(String[] args) {
        /* 두 개의 정수를 입력 받아 변수에 저장하고,
         * 연산기호(+, -, *, /, %)를 입력 받아 해당 연산의 수행 결과를 출력하세요.
         * 단, 준비된 연산기호 외의 문자를 입력하는 경우 "입력하신 연산은 없습니다. 프로그램을 종료합니다." 출력 후 프로그램 종료
         *
         * -- 입력 예시 --
         * 첫 번째 정수 : 4
         * 두 번쨰 정수 : 3
         * 연산 기호를 입력하세요 : +
         *
         * -- 출력 예시 --
         * 4 + 3 = 7
         */

        System.out.println("1. 정수를 입력하시오 !");
        Scanner sc = new Scanner(System.in);
        int first = sc.nextInt();
        System.out.println("2. 정수를 입력하시오 !");
        int second = sc.nextInt();
        System.out.println("연산 기호 입력 : +, -, *, /, % 중 택 1");
        char operator = sc.next().charAt(0); // char 사용 시에는 charAt으로 인덱스로 선택해야 사용할 수 있다.

//        if (operator == '+') { // char는 문자이므로 "가 아닌 '를 사용
//            System.out.println(first + second);
//        } else if (operator == '-') {
//            System.out.println(first - second);
//        } else if (operator == '*') {
//            System.out.println(first * second);
//        } else if (operator == '/') {
//            System.out.println(first / second);
//        } else if (operator == '%') {
//            System.out.println(first % second);
//        } else {
//            System.out.println("입력하신 연산은 없습니다. 프로그램을 종료합니다.");
//        }
//        System.out.println("끝");

        int operate = 0;

        switch (operator) {
            case '+' :
                operate = first + second;
                break;
            case '-' :
                operate = first - second;
                break;
            case '*' :
                operate = first * second;
                break;
            case '/' :
                operate = first / second;
                break;
            case '%' :
                operate = first % second;
                break;
            default :
                System.out.println("입력하신 연산은 없습니다. 프로그램을 종료합니다.");
                break;
        }
        System.out.println(operate);
    }
}
