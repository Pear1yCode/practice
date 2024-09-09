package Java.testQuestion.looping;

import java.util.Scanner;

public class For_Application1 {
    public void gugudan() {
        // 구구단을 언제든 +, -, *, /, %로 바꿀 수 있는 반복문으로 만들어보시오 !
        System.out.println("+, -, *, /, % 입력");
        Scanner sc = new Scanner(System.in);
        char op = sc.next().charAt(0);


        for (int i = 2; i < 10; i++) {
            for (int j = 1; j < 10; j++) {
                int result = 0;

                switch (op) {
                    case '+':
                        result = (i + j);
                        System.out.println(i + "+" + j + "=" + result);
                        break;
                    case '-':
                        result = (i - j);
                        System.out.println(i + "-" + j + "=" + result);
                        break;
                    case '*':
                        result = (i * j);
                        System.out.println(i + "*" + j + "=" + result);
                        break;
                    case '/':
                        result = (i / j);
                        System.out.println(i + "/" + j + "=" + result);
                        break;
                    case '%':
                        result = (i % j);
                        System.out.println(i + "%" + j + "=" + result);
                        break;
                    default:
                        System.out.println("잘못된 입력입니다.");
                        break;
                }
            }
            System.out.println();
        }
    }
}

