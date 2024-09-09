package question.Array;

import java.util.Scanner;

public class For_Application2 {
    public void gl() {
        String[] str = new String[5];
        Scanner sc = new Scanner(System.in);

        for (int i = 0; i < str.length; i++) {
            System.out.print("좋아하는 과일 : ");
            str[i] = sc.nextLine();
        }
        System.out.print("내가 좋아하는 과일은 : ");
        for (int i = 0; i < str.length; i++) {
            System.out.print(str[i] + ", ");
        }
    }
}
