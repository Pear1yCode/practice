package Java.testQuestion.maketree.tree;

import java.util.Scanner;

public class Trees {

    // 조금 공부 더 해보고 만든 버전
    public void tr () {
        System.out.print("트리 만들기 : ");
        Scanner sc = new Scanner(System.in);
        int tree = sc.nextInt();
        String trees = "*";

        for (int i = 0; i < tree; i++) {
            System.out.print(" ");
            for (int j = (tree - i); j > 0 ; j-- ) {
                System.out.print(" ");
            }
            System.out.println(trees);
            trees += "**";
        }
    }
}
