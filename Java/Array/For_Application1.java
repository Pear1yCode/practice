package question.Array;

import java.util.Scanner;

public class For_Application1 {
    public static void hello() {
        System.out.print("1~10의 정수 입력");
        Scanner sc = new Scanner(System.in);
        int ans = sc.nextInt();
        int[] rd = new int[ans];
        int Random = (int)(Math.random()*rd.length);
        int[] rd1 = new int[Random];
        if (ans >= 1 && ans <= 10) {
            for (int i = 0; i < rd1.length; i++){
                System.out.print(rd1[i] + ", ");
            }
            } else {
            System.out.println("제대로 된 숫자를 입력해주세요.");
        }
        }
    }
