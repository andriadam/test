import java.util.Scanner;

public class TestHome{

  public static void main(String[] args) {
    // membuat scanner baru
    Scanner input = new Scanner(System.in);

    // menggunakan scanner dan menyimpan apa yang diketik
    int n = input.nextLine();
    List<int> array = {map(input.nextLine().split(" ")).mapToInt(Integer::parseInt)};
    int count = 0;
    Stack stack= new Stack();
    int max= 0;

    for (int i = 0; i < array.size(); i++){
      if (array.size() == 0 && array.indexOf(i) > 0) {
        stack.push(array.indexOf(i));
      } else if (array.size() > 0) {
        if (-1*stack.indexOf(-1) == array.indexOf(i) &&stack.indexOf(-1) > 0){
          stack.pop();
          count +=  2;
        }
        if (max < count) {
          max = count;
        } else{
        stack.push(array.indexOf(i));
          count=0;
        }
      }
    }
    System.out.println(max);
  }

}