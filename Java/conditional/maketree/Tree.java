package Java.testQuestion.maketree;

import java.util.Scanner;
// 혼자서 간단하게 만들어본 버전 (어느정도는 하겠지만 약간 부족함이 있어 제대로 된 트리를 만들기 어려웠다.
public class Tree {
    StringBuilder sb = new StringBuilder();

    public void tr () {
        Scanner sc = new Scanner(System.in);
        System.out.print("트리 만들기 : ");
        int tree = sc.nextInt();
        String trees = "*";
        for (int i = 0; i <= tree; i ++) {
            System.out.print(sb.insert(0, " *"));
            System.out.println(trees.repeat(i));
                }
            }
        }
