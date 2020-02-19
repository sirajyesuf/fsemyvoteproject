<div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i>MyVoteElectionRunnerPlatform,Inc
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{$user->name}}</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email:{{$user->email}}
                  </address>
                </div>
                
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Rank</th>
                      <th>FullName</th>
                      <th>TotalVote</th>
                      <th>Percentage</th>
                    </tr>
                    </thead>
                    <tbody>

                      @foreach($candidates as $candidate)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$candidate->title}}</td>
                      <td>{{$candidate->vote}}</td>
                      <td>

                        @if($candidate->vote)
                         {{($sum_ofvote/$candidate->vote)*100}}%
                        @else
                         0%
                        @endif

                     </td>
                
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                
               
              </div>
            
            </div>